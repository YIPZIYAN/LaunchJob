<?php

namespace App\Livewire\Mail;

use App\Models\JobApplication;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateOfferLetter extends Component
{
    use WithFileUploads;

    public JobApplication $jobApplication;

    #[Validate('required|mimes:pdf')]
    public $letter;

    public function render()
    {
        return view('livewire.mail.create-offer-letter');
    }

    public function submit()
    {
        $this->validate();

        $file = $this->letter->store('offer-letters', 'public');
        $this->jobApplication->update(['offer_letter' => $file]);
        $this->jobApplication->state()->offer();
    }
}
