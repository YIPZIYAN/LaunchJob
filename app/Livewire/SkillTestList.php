<?php

namespace App\Livewire;

use GuzzleHttp\Exception\ConnectException;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SkillTestList extends Component
{

    public $skill_tests;
    public function mount()
    {
        try {
            $this->skill_tests = json_decode(Http::skill_test()->get('/'));
        } catch (ConnectException $e) {
            $this->skill_tests = [];
            session()->flash('error', 'Failed to retrieve events. Please try again later.');
        }

    }

    public function render()
    {
        return view('livewire.skill-test-list');
    }
}
