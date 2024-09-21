<?php

namespace App\Livewire;

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
        $this->events = json_decode(Http::event()->get('/'));
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
    }

    public function submit($event_id)
    {
        $response = Http::event()->post('/apply', [
            'event_id' => $event_id,
            'name' => $this->name,
            'email' => $this->email,
        ]);

        $message = $response->successful()
            ? ['success' => 'Applied the event successfully.']
            : ['error' => json_decode($response->body(), true)];

        return redirect()->route('job-post.show', $this->jobPost)->with($message);
    }

    public function render()
    {
        return view('livewire.event-recommendation');
    }
}
