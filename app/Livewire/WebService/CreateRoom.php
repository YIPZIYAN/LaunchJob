<?php

namespace App\Livewire\WebService;

use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateRoom extends Component
{
    use WithFileUploads;

    public $owner;
    public $email;
    public $phone;

    public $name;
    public $price;
    public $type;
    public $prefer;
    public $location;
    public $description;

    #[Validate('required|image|max:2048')]
    public $thumbnail;
    #[Validate(['gallery.*' => 'image|max:2048'])]
    public $gallery=[];

    public function getUrl($image)
    {
        $url = '';
        try {
            $url = $image->temporaryUrl();
        }catch (Exception $exception){
            Log::error($exception->getMessage());
        }

        return $url;
    }

    public function mount()
    {
        if (auth()->check()) {
            $this->email = auth()->user()->email;
            $this->owner = auth()->user()->name;
        }
    }

    protected function rules()
    {
        return [
            'owner' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:100'],
            'phone' => ['required', 'string', 'max:100'],
            'name' => ['required', 'string', 'max:100'],
            'price' => ['required', 'integer', 'min:1', 'max:999999'],
            'type' => ['required', 'string', 'max:100'],
            'prefer' => ['required', 'string', 'max:100'],
            'location' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string', 'max:1000'],
        ];
    }

    public function render()
    {
        return view('livewire.web-service.create-room');
    }

    public function submit()
    {


        $this->validate();
        $this->thumbnail->store('thumbnail');


        try {
            $response = Http::asMultipart()->attach(
                'thumbnail',
                fopen(storage_path('app/thumbnail/' . $this->thumbnail->hashName()), 'r'),
                $this->thumbnail->hashName()
            )->post('127.0.0.1:8001/rooms/create', [
                'email' => $this->email,
                'contact' => $this->phone,
                'name' => $this->name,
                'price' => $this->price,
                'type' => $this->type,
                'tags' => $this->prefer,
                'location' => $this->location,
                'description' => $this->description,
                'owner' => $this->owner,
            ]);


            $galleryResponse = Http::asMultipart();
            if ($this->gallery != null) {
                foreach ($this->gallery as $image) {
                    $image->store('gallery');
                    $galleryResponse->attach(
                        'image',
                        fopen(storage_path('app/gallery/') . $image->hashName(), 'r'),
                        $image->hashName()
                    );
                }
                $galleryResponse->post('127.0.0.1:8001/rooms/gallery/create', [
                    'room' => json_decode($response->body())->id
                ]);
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('home')->with([
                'error'=> 'Service unavailable'
            ]);
        }

        $message = $response->successful() ?
            ['success'=> 'Room information posted successfully.'] :
            ['error'=> 'Unable to post room information.'];

        return redirect()->route('home')->with($message);
    }
}
