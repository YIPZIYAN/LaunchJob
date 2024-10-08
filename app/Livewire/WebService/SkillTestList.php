<?php

namespace App\Livewire\WebService;

use GuzzleHttp\Exception\ConnectException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class SkillTestList extends Component
{

    public $skill_tests;
    public $employee_skill_tests;
    public function mount()
    {
        try {
            $this->skill_tests = json_decode(Http::skill_test()->get('/'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            $this->skill_tests = [];
            session()->flash('error', 'Failed to retrieve skill test. Please try again later.');
        }


        $this->employee_skill_tests = auth()->user()->employee->employeeSkillTest()->get();

    }

    public function render()
    {
        return view('livewire.web-service.skill-test-list');
    }
}
