<?php

namespace App\Notifications;

use App\Models\JobPost;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class JobPostCreated extends Notification implements ShouldQueue
{
    use Queueable;

    protected $jobPost;

    /**
     * Create a new notification instance.
     */
    public function __construct(JobPost $jobPost)
    {
        $this->jobPost = $jobPost;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Job for ' . $this->jobPost->jobType->name)
            ->greeting('Hi there!')
            ->line('Your interest job type has a new job post !')
            ->line('Job Name: ' . $this->jobPost->name)
            ->line('Company: ' . $this->jobPost->company->name)
            ->line('Location: ' . $this->jobPost->location)
            ->action('View Job Details', url('http://127.0.0.1:8000/job-post/' . $this->jobPost->id))
            ->line('Apply the job NOW !');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }

}
