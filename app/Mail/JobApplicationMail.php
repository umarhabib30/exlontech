<?php

namespace App\Mail;

use App\Models\JobApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class JobApplicationMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(public JobApplication $application)
    {
        $this->application->loadMissing('job');
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Job Application: ' . $this->application->job->title,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mails.job-application',
            with: [
                'application' => $this->application,
            ],
        );
    }

    public function attachments(): array
    {
        if (! Storage::exists($this->application->resume_path)) {
            return [];
        }

        return [
            Attachment::fromPath(Storage::path($this->application->resume_path))
                ->as($this->application->resume_original_name),
        ];
    }
}
