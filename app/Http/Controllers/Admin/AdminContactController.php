<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;

/**
 * Classe d'administration du formulaire de contact
 * @author Tristan Lefèvre
 * @version 1.0
 */
class AdminContactController extends Controller
{
    /**
     * affiche la page d'administration des formulaires de contacts
     * @return view page Admin Contact listant les messages
     */
    public function indexContact() {
        $contacts = DB::table('contacts')->select('id','name', 'mail', 'subject')->get();
        return view('adminContact', ['contacts' => $contacts]);
    }

    /**
     * affiche le message selectionné
     * @return view page AdminContactMessage montrant le message
     */
    public function showmessage($id) {
        $contact = DB::table('contacts')->where('id', $id)->first();
        return view('adminContactMessage',['contact' => $contact]);
    }
}
