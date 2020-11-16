<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\competence;
use App\experience;
use App\formation;
use App\langage;

/**
 * @author Tristan
 * @version 1
 * 
 * Classe d'administration pour la modification du cv.
 */
class AdminCVController extends Controller
{
    /**
     * Affiche les différents éléments du cv ainsi que les formulaires associés
     * @return view page d'administration du cv avec ces informations
     */
    public function indexCV() {
        $experiences = DB::table('experiences')->orderby('place','asc')->get();
        $places = [];
        for ($i = 0; $i < count($experiences); $i++) {
            $places[$i]= $i++;
        }
        $competences = DB::table('competences')->get();
        $formations = DB::table('formations')->get();
        $langages = DB::table('langages')->get();
        return view('adminCV', ['experiences' => $experiences, 'competences' => $competences, 'formations' => $formations,'langages' => $langages, 'places' => $places]);
    }
    /**
     * Ajoute un élément du cv en fonction du formulaire utilisé
     * @return view page précédente
     * @todo faire fonctionner la redirection correctement
     */
    public function addCV(Request $request) {
        switch ($request->section) {
            case "experience":
                $experiences = DB::table('experiences')->get();
                $experience = new experience();
                $experience->titre = $request->titre;
                $experience->date = $request->date;
                $experience->company = $request->company;
                $experience->description = $request->description;
                $experience->place = count($experiences);
                
                $experience->save();
            break;
            case "competence":
                $competence = new competence();
                $competence->titre = $request->titre;
                $competence->description = $request->description;

                $competence->save();
            break;
            case "formation":
                $formation = new formation();
                $formation->titre = $request->titre;
                $formation->date = $request->date;
                $formation->image = $request->image;
                $formation->description = $request->description;

                $formation->save();

            break;
            case "langage":
                $langage = new langage();
                $langage->titre = $request->titre;
                $langage->description = $request->description;

                $langage->save();
            break;

        }
        return redirect()->back();
    }
    /**
     * Modifie un élément du cv en fonction du formulaire utilisé
     * @return view page précédente
     * @todo faire fonctionner la redirection correctement
     */
    public function modifycv(Request $request) {
        switch ($request->section) {
            case "experience":
                $experience = experience::find($request->id);
                if ($request->place != $experience->place) {
                    if($request->place > $experience->place) {
                        DB::table('experiences')->where('place','>=',$request->place)->where('place','<',$experience->place)->decrement('place');
                    } else {
                        DB::table('experiences')->where('place','<',$request->place)->where('place','>=',$experience->place)->increment('place');
                    }
                }
                $experience->update(['titre'=> $request->titre,'date'=> $request->date,'company'=> $request->company, 'description' => $request->description, 'place' => $request->place]);
            break;
            case "competence":
                $competence = competence::find($request->id);
                $competence->update(['titre'=> $request->titre,'description' => $request->description]);

            break;
            case "formation":
                $formation = formation::find($request->id);
                $formation->update(['titre'=> $request->titre, 'date' => $request->date,'image' => $request->image, 'description' => $request->description]);
            break;
            case "langage":
                $langage = langage::find($request->id);
                $langage->update(['titre'=> $request->titre, 'niveau' => $request->niveau, 'description' => $request->description]);
            break;
        }
        return redirect()->back();
    }
    /**
     * Supprime un élément du cv en fonction du formulaire utilisé
     * @return view page précédente
     * @todo faire fonctionner la redirection correctement
     */
    public function removeCV(Request $request) {
        switch ($request->section) {
            case "experience":
                $experience = experience::find($request->id);
                $experience->delete();
            break;
            case "competence":
                $competence = competence::find($request->id);
                $competence->delete();
            break;
            case "formation":
                $formation = formation::find($request->id);
                $formation->delete();

            break;
            case "langage":
                $langage = langage::find($request->id);
                $langage->delete();
            break;

        }
        return redirect()->back();
    }
}
