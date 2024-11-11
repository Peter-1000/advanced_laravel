<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\EmailMailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends BaseController
{

    public function sendEmail()
    {
        Mail::to(auth()->user()->email)->send(new EmailMailer());
        return $this->sendResponse('Sent successfully');
    }


}
