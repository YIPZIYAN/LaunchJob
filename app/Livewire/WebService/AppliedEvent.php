<?php

namespace App\Livewire\WebService;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class AppliedEvent extends Component
{

    public $event_list;
    public $past_events = [];

    public function mount()
    {

        try {
            $response = Http::event()->get('/event-attendee', [
                'email' => auth()->user()->email
            ]);
            $this->event_list = $response->successful() ? json_decode($response) : null;

            if($this->event_list)
            {
                $today = Carbon::today();
                foreach ($this->event_list as $key => $event) {
                    $start_date = Carbon::parse($event->start_date);

                    if ($start_date->lessThan($today)) {
                        $this->past_events[] = $event;
                        unset($this->event_list[$key]);
                    }
                }
                $this->event_list = array_values($this->event_list);
            }
        }catch (\Exception $exception){
            Log::error($exception->getMessage());
        }


    }

    public function render()
    {
        return view('livewire.web-service.applied-event');
    }
}
