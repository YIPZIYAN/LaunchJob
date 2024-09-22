<?php

namespace App\Livewire\WebService;

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
            session()->flash('error', 'Failed to retrieve skill test. Please try again later.');
        }

    }

    public function render()
    {
        return view('livewire.web-service.skill-test-list');
    }
}
