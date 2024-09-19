<?php

namespace App\Livewire\Mail;

use App\Models\JobApplication;
use Livewire\Component;

class CreateOfferLetter extends Component
{
    public JobApplication $jobApplication;
    public function render()
    {
        return view('livewire.mail.create-offer-letter');
    }
}
