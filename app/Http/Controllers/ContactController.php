<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;

class ContactController extends Controller
{
    public function index() 
    {
        return view('Contact', ['title' => 'Contact']);
    }

    public function postContact(Request $request)
    {
        Mail::send(
            'mailContact',
            [ 'name' => $request->name, 'email' => $request->email, 'society' => $request->society, 'message' => $request->message ],
            function($message) {
            $message->to('tristan.lefevre@viacesi.fr');
        });
    }
}
