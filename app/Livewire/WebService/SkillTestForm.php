<?php

namespace App\Livewire\WebService;

use GuzzleHttp\Exception\ConnectException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class SkillTestForm extends Component
{

    public $skill_test;
    public string $id;
    public $answers = [];


    public function mount()
    {
        try {
            $this->skill_test = json_decode(Http::skill_test()->get('/get', [
                'id' => $this->id,
            ]));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            $this->skill_test = [];
            session()->flash('error', 'Failed to retrieve events. Please try again later.');
        }

    }


    public function submit()
    {

        if (count($this->skill_test->questions) != count($this->answers)) {
            $message = ['error' => 'Please answer all the questions'];
            return redirect()->route('skills.index', $this->id)->with($message);
        }

        foreach ($this->answers as $question_id => $selected_option_id) {
            $submitted_answers[] = [
                'question_id' => $question_id,            // Add question_id
                'selected_option_id' => $selected_option_id // Add selected_option_id
            ];
        }

        try {
            $response = Http::skill_test()->post('/submit', [
                'skill_test_id' => $this->id,
                'submitted_answers' => $submitted_answers,
            ]);

            if ($response->successful()) {
                $this->saveResult($response);
            }

            $message = $response->successful()
                ? ['success' => 'Congratulations! Skill test submitted and graded.']
                : ['error' => json_decode($response->body(), true)];

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            $message = ['error' => 'Could not submit the test. Please try again later.'];
        }

        return redirect()->route('profile.edit')->with($message);
    }

    public function saveResult($response): void
    {
        $employee = auth()->user()->employee;
        $result = json_decode($response->body());
        $id = (int)$this->id;
        $percentage = (int)$result->percentage;
        $existingRecord = $employee->employeeSkillTest()->where('skill_test_id', '=', $id)->first();
        if ($existingRecord)
        {
            $existingRecord->update(['percentage' => $percentage]);
        }
        else
        {
            $employee->employeeSkillTest()->create([
                'skill_test_id' => $id,
                'percentage' => $percentage,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.web-service.skill-test-form');
    }


}
