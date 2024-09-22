<?php

namespace App\Livewire\WebService;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ShowRoom extends Component
{
    public string $id;
    public $room;

    public function mount()
    {
        try {
           $this->room = json_decode(Http::room()->get($this->id));
        }catch (\Exception $exception){
            Log::error($exception->getMessage());
            return redirect()->route('home')->with(['error'=> 'Service unavailable']);
        }
    }

    public function render()
    {
        return view('livewire.web-service.show-room');
    }
}
