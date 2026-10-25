<?php

namespace App\Mail;

use App\Models\Post;
use App\Models\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class NewPostNotification extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Post $post,
        public Subscriber $subscriber,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "Nouvel article : {$this->post->title}",
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.new-post',
            with: [
                'unsubscribeUrl' => URL::temporarySignedRoute(
                    'blog.unsubscribe',
                    now()->addDays(30),
                    ['subscriber' => $this->subscriber->id]
                ),
            ],
        );
    }
}
