<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;
use Mail;

class ContactApiController extends Controller
{
    public function send(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        //This creates a new instance of the Contact class which sends the Mail message to my email using the data we received from the HTTP POST API request sent by Vue.
        Mail::to('kenstuddy@gmail.com')->send(new Contact($request));
    }
}
