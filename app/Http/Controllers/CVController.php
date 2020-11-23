<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\competence;
use App\experience;
use App\formation;
use App\langage;

/**
 * Classe publique du CV
 * @author Tristan Lefèvre
 * @version 1.0
 */
class CVController extends Controller
{
    /**
     * affiche le CV
     * @return view CV, la page présentant l'expérience, les compétences, les formations et les langages
     */
    public function index() {

        $experiences = DB::table('experiences')->orderby('place','asc')->get();
        $competences = DB::table('competences')->get();
        $formations = DB::table('formations')->get();
        $langages = DB::table('langages')->get();
        return view('CV', ['experiences' => $experiences, 'competences' => $competences, 'formations' => $formations,'langages' => $langages]);
    }
}
