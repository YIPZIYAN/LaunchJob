<?php

namespace App\Livewire\WebService;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class AppliedEvent extends Component
{

    public $event_list;

    public function mount()
    {

        try {
            $response = Http::event()->get('/event-attendee', [
                'email' => auth()->user()->email
            ]);
            $this->event_list = $response->successful() ? json_decode($response) : null;
        }catch (\Exception $exception){
            Log::error($exception->getMessage());
        }


    }

    public function render()
    {
        return view('livewire.web-service.applied-event');
    }
}
