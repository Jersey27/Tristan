<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Contact;

use App\Http\Requests\ContactRequest;

use Mail;

class ContactController extends Controller
{
    public function index() 
    {
        return view('Contact', ['title' => 'Contact']);
    }

    public function store(ContactRequest $request)
    {
/*        Mail::send(
            'mailContact',
            [ 'name' => $request->name, 'email' => $request->email, 'society' => $request->society, 'message' => $request->message ],
            function($message) {
            $message->to('tristan.lefevre@viacesi.fr');
        });*/
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->society = $request->society;
        $contact->mail = $request->mail;
        $contact->message = $request->message;

        $contact->save();
        
        return view('message',['title' => 'merci', 'message' => 'Merci pour votre message. Une réponse vous sera envoyé rapidement', 'type' => 'success']);
    }
}
