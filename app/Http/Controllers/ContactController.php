<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Contact;

use App\Mail\contactMail;

use App\Http\Requests\ContactRequest;

use Mail;

/**
 * Classe publique de contact
 * @author Tristan Lefèvre
 * @version 1.0 
 */
class ContactController extends Controller
{

    /**
     * Affiche le formulaire de contact
     * @return view contact, le formulaire de contact
     */
    public function index() 
    {
        return view('Contact', ['title' => 'Contact']);
    }

    /**
     * Enregistre le formulaire de contact
     * @return view message 
     * @todo activer le système de mail (mettre en place)
     * @todo rediriger vers le formulaire et ajouter un message
     */
    public function store(ContactRequest $request)
    {
        //Mail::to('tristan.lefevre@viacesi.fr')->send(new contactMail($request->except('_token')));
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->society = $request->society;
        $contact->mail = $request->mail;
        $contact->subject = $request->subject;
        $contact->message = $request->message;

        $contact->save();
        
        return view('message',['title' => 'merci', 'message' => 'Merci pour votre message. Une réponse vous sera envoyé rapidement', 'type' => 'success']);
    }
}
