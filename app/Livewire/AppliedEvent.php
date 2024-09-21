<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class AppliedEvent extends Component
{

    public $event_list;

    public function mount()
    {

        $response = Http::event()->get('/event-attendee', [
            'email' => auth()->user()->email
        ]);

        $event_list = $response->successful() ? $response->json() : null;
    }

    public function render()
    {
        return view('livewire.applied-event');
    }
}
