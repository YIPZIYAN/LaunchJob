<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class AppliedEvent extends Component
{

    public $event_list;

    public function mount()
    {
        $this->event_list = json_decode(Http::event()->get('/event-attendee', [
            'email' => auth()->user()->email
        ]));
    }

    public function render()
    {
        return view('livewire.applied-event');
    }
}
