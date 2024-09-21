<?php

namespace App\Livewire\WebService;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class RoomRecommendation extends Component
{

    public $rooms;

    public function mount()
    {
        try {
            $this->rooms = json_decode(Http::room()->get(''));
        } catch (\Exception $exception) {
            return redirect()->route('home')->with(['error'=>'Service unavailable']);
        }

    }

    public function render()
    {
        return view('livewire.web-service.room-recommendation');
    }
}
