<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index()
    {
        $presentation = DB::table('informations', 'aboutme')->get()->first();
        return view('welcome', [
            'title' => 'Tristan Lefèvre', 
            'presentation' => $presentation->information_data,
            ]
        );
    }
}
