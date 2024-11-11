<?php

namespace App\Listeners;

use App\Events\NewProductEvent;
use App\Mail\EmailMailer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendProductMail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\NewProductEvent  $event
     * @return void
     */
    public function handle(NewProductEvent $event)
    {
        Mail::to(auth()->user()->email ?? 'test@gmail.com')->send(new EmailMailer(true, $event->product));
    }
}
