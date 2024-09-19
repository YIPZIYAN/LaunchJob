<?php

namespace App\Livewire\Interview;

use App\Models\Interview;
use App\Models\JobApplication;
use Illuminate\Validation\Rule;
use Livewire\Component;

class CreateInterview extends Component
{
    public JobApplication $jobApplication;
    public $date;
    public $start_time;
    public $end_time;
    protected $mode;
    public $isOnline;
    public $isCompanyAddress;
    public $link;
    public $inputLink;

    public $location;
    public $description;


    public function enterCompanyAddress()
    {
        $this->isCompanyAddress ?
            $this->location = auth()->user()->company->address :
            $this->location = '';
    }

    protected function rules()
    {
        return [
            'date' => ['date', 'required', 'after_or_equal:' . now()->format('Y-m-d')],
            'start_time' => ['date_format:H:i', 'required'],
            'end_time' => ['date_format:H:i', 'required', 'after:start_time'],
            'link' => ['nullable', 'url', Rule::requiredIf($this->isOnline)],
            'location' => ['nullable', 'string', Rule::requiredIf(!$this->isOnline)],
            'description' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function submit()
    {
        if ($this->isOnline) {
            $this->link = "https://www." . $this->inputLink;
        }

        $this->mode = $this->isOnline ? 'online' : 'physical';
        $validatedData = $this->validate();
        $validatedData['mode'] = $this->mode;

        $this->jobApplication->interviews()->create($validatedData);
        $this->jobApplication->state()->scheduleInterview();



    }

    public function render()
    {
        return view('livewire.interview.create-interview');
    }
}
