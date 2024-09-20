<?php

namespace App\Livewire\Interview;

use App\Models\Interview;
use Illuminate\Validation\Rule;
use Livewire\Component;

class EditInterview extends Component
{

    public Interview $interview;
    public $date;
    public $start_time;
    public $end_time;
    protected $mode;
    public $isOnline = true;
    public $isCompanyAddress;
    public $link;
    public $inputLink;

    public $location;
    public $description;

    public function mount()
    {
        $this->isOnline = $this->interview->mode == "online";
        $this->inputLink = substr($this->interview->link, 12);
        $this->fill($this->interview->toArray());

        $this->start_time = $this->interview->getAttributes()['start_time'];
        $this->end_time = $this->interview->getAttributes()['end_time'];

    }

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
            'description' => ['required', 'string', 'max:255'],
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

        $message = $this->interview->update($validatedData)
            ? ['success' => 'Interview updated successfully!']
            : ['error' => 'Failed to edit this interview'];

        return redirect()->route('management.interview.index')->with($message);

    }

    public function delete()
    {
        $message = $this->interview->delete()
            ? ['success' => 'Interview deleted successfully!']
            : ['error' => 'Failed to delete this interview'];

        return redirect()->route('management.interview.index')->with($message);
    }

    public function render()
    {
        return view('livewire.interview.edit-interview');
    }
}
