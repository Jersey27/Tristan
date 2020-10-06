<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function home() {
        return view('adminHome');
    }

    public function indexCV() {
        return view('adminCV');
    }
    public function indexContact() {
        $contacts = DB::table('contacts')->select('id','name', 'mail', 'subject')->get();
        return view('adminContact', ['contacts' => $contacts]);
    }
    public function showmessage($id) {
        $contact = DB::table('contacts')->where('id', $id)->first();
        return view('adminContactMessage',['contact' => $contact]);
    }
}
