<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Classe publique de la page d'acceuil
 * @author Tristan Lefèvre
 * @version 1.0
 */
class WelcomeController extends Controller
{
    /**
     * Affiche la page d'acceuil
     * @return view welcome, la page d'acceuil avec des informations de présentations
     */
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
