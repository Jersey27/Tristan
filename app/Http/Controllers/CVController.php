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
    /**
     * Met à jour le CV pour afficher / supprimer des éléments
     * @return json Confirmation de la requête
     */
    public function toggleVisible(Request $request) {
        if($request->ajax()) {
            switch ($request->category) {
                case ("experience") :
                    $experience = experience::find($request->id);
                    if ($experience->visible == 0) {
                        $experience->update(['visible' => true]);
                    } else {
                        $experience->update(['visible' => false]);
                    }
                break;
                case ("competence") :
                    $competence = competence::find($request->id);
                    if ($competence->visible == 0) {
                        $competence->update(['visible' => true]);
                    } else {
                        $competence->update(['visible' => false]);
                    }
                break;
                case ("formation") :
                    $formation = formation::find($request->id);
                    if ($formation->visible == 0) {
                        $formation->update(['visible' => true]);
                    } else {
                        $formation->update(['visible' => false]);
                    }
                break;
                case ("langage") :
                    $langage = langage::find($request->id);
                    if ($langage->visible == 0) {
                        $langage->update(['visible' => true]);
                    } else {
                        $langage->update(['visible' => false]);
                    }
                break;
            }
            return response()->json(['result' => 'success']);
        }
        abort(404);
    }
}
