<?php

namespace App\Mail;

use App\Models\Product;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmailMailer extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public bool $isProductEmail;
    public $product;

    /**
     * Create a new message instance.
     *
     * @param bool $isProductEmail
     * @param $product
     */
    public function __construct(bool $isProductEmail = false, $product = null)
    {
        $this->user           = auth()->user();
        $this->isProductEmail = $isProductEmail;
        $this->product        = $product;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: $this->isProductEmail ? 'New Product' : 'Testing emails',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'email',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
