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
        'status',
        'offer_letter'
    ];

    public function state()
    {
        return match (JobApplicationState::tryFrom($this->status)) {
            JobApplicationState::NEW => new NewState($this),
            JobApplicationState::SHORTLISTED => new ShortlistedState($this),
            JobApplicationState::INTERVIEWING => new InterviewingState($this),
            JobApplicationState::OFFERING => new OfferingState($this),
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

    public function interviews(): HasMany
    {
        return $this->hasMany(Interview::class, 'job_application_id');
    }
}
