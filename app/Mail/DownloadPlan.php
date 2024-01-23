<?php

namespace App\Mail;

use App\Models\Businessinfo;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
class DownloadPlan extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public Businessinfo $businessinfo;
    public function __construct(Businessinfo $businessinfo)
    {
        //
        $this->businessinfo = $businessinfo;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Loan Application Submission Confirmation',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $user = Auth::user();
        $businessInfo = Businessinfo::where('user_id',$user->id)
              ->where('plan_type',1);
        ;
        return new Content(
            view: 'email.complete',
            with: [ 
               'user' => $user,
               'businessInfo' => $businessInfo,
            ]
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
