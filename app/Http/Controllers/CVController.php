<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\competence;
use App\experience;
use App\formation;
use App\langage;

class CVController extends Controller
{
    public function index() {

        $experiences = DB::table('experiences')->get();
        $competences = DB::table('competences')->get();
        $formations = DB::table('formations')->get();
        $langages = DB::table('langages')->get();
        return view('CV', ['experiences' => $experiences, 'competences' => $competences, 'formations' => $formations,'langages' => $langages]);
    }
}
