<?php

namespace App\Livewire\WebService;

use GuzzleHttp\Exception\ConnectException;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class EventRecommendation extends Component
{

    public $jobPost;
    public $events;
    public $name;
    public $email;

    public function mount()
    {
        try {
            $this->events = json_decode(Http::event()->get('/'));
        } catch (\Exception $e) {
            $this->events = [];
            session()->flash('error', 'Failed to retrieve events. Please try again later.');
        }
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
    }

    public function submit($event_id)
    {
        try {
            $response = Http::event()->post('/apply', [
                'event_id' => $event_id,
                'name' => $this->name,
                'email' => $this->email,
            ]);

            $message = $response->successful()
                ? ['success' => 'Applied the event successfully.']
                : ['error' => json_decode($response->body(), true)];
        } catch (ConnectException $e) {
            $message = ['error' => 'Could not apply the event. Please try again later.'];
        }

        return redirect()->route('job-post.show', $this->jobPost)->with($message);
    }

    public function render()
    {
        return view('livewire.web-service.event-recommendation');
    }
}
