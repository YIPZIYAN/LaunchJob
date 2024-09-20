<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class RoomRecommandation extends Component
{

    public $rooms;
    public $imageUrl;

    public function mount()
    {

        $this->rooms = json_decode(Http::room()->get('/'));
    }

    public function render()
    {
        return view('livewire.room-recommandation');
    }
}
