<?php

namespace App\Livewire\WebService;

use GuzzleHttp\Exception\ConnectException;
use Illuminate\Support\Facades\Http;
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
        } catch (ConnectException $e) {
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
                'question_id' => (int)$question_id,            // Add question_id
                'selected_option_id' => (int)$selected_option_id // Add selected_option_id
            ];
        }
        try {
            $response = Http::skill_test()->post('/submit', [
                'skill_test_id' => $this->id,
                'submitted_answers' => $submitted_answers,
            ]);
            
            $message = $response->successful()
                ? ['success' => 'Congratulations! Skill test submitted and graded.']
                : ['error' => json_decode($response->body(), true)];
        } catch (ConnectException $e) {
            $message = ['error' => 'Could not apply the event. Please try again later.'];
        }

        return redirect()->route('skills.index', $this->id)->with($message);
    }

    public function render()
    {
        return view('livewire.web-service.skill-test-form');
    }
}
