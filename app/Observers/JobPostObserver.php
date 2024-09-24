<?php

namespace App\Observers;

use App\Models\JobPost;
use App\Models\User;
use App\Notifications\JobPostCreated;
use App\Notifications\JobPostUpdated;
use Illuminate\Support\Facades\Notification;

class JobPostObserver
{
    /**
     * Handle the JobPost "created" event.
     */
    public function created(JobPost $jobPost): void
    {
        $users = User::whereHas('employee.interestJobType', function ($query) use ($jobPost) {
            $query->where('job_type_id', $jobPost->job_type_id);
        })->get();

        Notification::send($users, new JobPostCreated($jobPost));
    }

    /**
     * Handle the JobPost "updated" event.
     */
    public function updated(JobPost $jobPost): void
    {
        $users = User::whereHas('jobPosts', function ($query) use ($jobPost) {
            $query->where('job_post_id', $jobPost->id)
                ->where('job_applications.status', 'new');
        })->get();

        Notification::send($users, new JobPostUpdated($jobPost));

    }

    /**
     * Handle the JobPost "deleted" event.
     */
    public function deleted(JobPost $jobPost): void
    {
        //
    }

    /**
     * Handle the JobPost "restored" event.
     */
    public function restored(JobPost $jobPost): void
    {
        //
    }

    public function deleting(JobPost $jobPost): void
    {
        $jobPost->jobApplications()->delete();
    }

    public function restoring(JobPost $jobPost): void
    {
        $jobPost->jobApplications()->withTrashed()->restore();
    }

    /**
     * Handle the JobPost "force deleted" event.
     */
    public function forceDeleted(JobPost $jobPost): void
    {
        //
    }
}
