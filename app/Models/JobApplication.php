<?php

namespace App\Models;

use App\StateMachine\JobApplication\JobApplicationState;
use App\StateMachine\JobApplication\StateClass\InterviewingState;
use App\StateMachine\JobApplication\StateClass\NewState;
use App\StateMachine\JobApplication\StateClass\OfferAcceptedState;
use App\StateMachine\JobApplication\StateClass\OfferingState;
use App\StateMachine\JobApplication\StateClass\OfferRejectedState;
use App\StateMachine\JobApplication\StateClass\RejectedState;
use App\StateMachine\JobApplication\StateClass\ShortlistedState;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'status' => 'new'
    ];

    public function state()
    {
        return match ($this->status) {
            JobApplicationState::NEW => new NewState($this),
            JobApplicationState::SHORTLISTED => new ShortlistedState($this),
            JobApplicationState::REJECTED => new RejectedState($this),
            JobApplicationState::INTERVIEWING => new InterviewingState($this),
            JobApplicationState::OFFERING => new OfferingState($this),
            JobApplicationState::OFFER_ACCEPTED => new OfferAcceptedState($this),
            JobApplicationState::OFFER_REJECTED => new OfferRejectedState($this),
        };
    }

    public function jobPost(): BelongsTo
    {
        return $this->belongsTo(JobPost::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
