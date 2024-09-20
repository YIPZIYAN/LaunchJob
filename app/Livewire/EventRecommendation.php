<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class EventRecommendation extends Component
{

    public $events;
    public $imageUrl;

    public function mount()
    {
        $this->events = json_decode(Http::event()->get('/'));
    }

    public function render()
    {
        return view('livewire.event-recommendation');
    }
}
