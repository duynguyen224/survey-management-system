<?php

namespace App\Mail;

use App\Models\Survey;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendSurvey extends Mailable
{
    use Queueable, SerializesModels;

    private Survey $survey;
    private User $engineer;
    private $deadline;
    private $surveyUrl;

    /**
     * Create a new message instance.
     */
    public function __construct(User $engineer, Survey $survey, $deadline, $surveyUrl)
    {
        $this->engineer = $engineer;
        $this->survey = $survey;
        $this->deadline = $deadline;
        $this->surveyUrl = $surveyUrl;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Survey Management System',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.survey',
            with: [
                'survey' => $this->survey,
                'engineer' => $this->engineer,
                'deadline' => $this->deadline,
                'surveyUrl' => $this->surveyUrl,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
