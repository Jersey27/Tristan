<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\competence;
use App\experience;
use App\formation;
use App\langage;

class AdminController extends Controller
{
    public function home() {
        return view('adminHome');
    }

    public function indexCV() {
        
        $experiences = DB::table('experiences')->get();
        $competences = DB::table('competences')->get();
        $formations = DB::table('formations')->get();
        $langages = DB::table('langages')->get();
        return view('adminCV', ['experiences' => $experiences, 'competences' => $competences, 'formations' => $formations,'langages' => $langages]);
    }
    public function indexContact() {
        $contacts = DB::table('contacts')->select('id','name', 'mail', 'subject')->get();
        return view('adminContact', ['contacts' => $contacts]);
    }
    public function showmessage($id) {
        $contact = DB::table('contacts')->where('id', $id)->first();
        return view('adminContactMessage',['contact' => $contact]);
    }
    public function addcv($section, Request $request) {
        switch ($section) {
            case "experience":
                $experience = new experience();
                $experience->titre = $request->titre;
                $experience->description = $request->description;

                $experience->save();
            break;
            case "competence":
                $competence = new competence();
                $competence->titre = $request->titre;
                $competence->progres = $request->progres;
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

            return redirect()->route('indexCV');
        }
    }
    public function modifycv($section, $id, Request $request) {
        switch ($section) {
            case "experience":
                $experience = experience::find($id);
                $experience->update(['titre'=> $request->titre, 'description' => $request->description]);
            break;
            case "competence":
                $competence = competence::find($id);
                $competence->update(['titre'=> $request->titre, 'progres' => $request->progres, 'description' => $request->description]);

            break;
            case "formation":
                $formation = formation::find($id);
                $formation->update(['titre'=> $request->titre, 'date' => $request->date,'image' => $request->image, 'description' => $request->description]);
            break;
            case "langage":
                $langage = langage::find($id);
                $langage->update(['titre'=> $request->titre, 'niveau' => $request->niveau, 'description' => $request->description]);
            break;

            return redirect()->route('indexCV');
        }
    }
    public function removeCV($section, $id, Request $request) {
        switch ($section) {
            case "experience":
                $experience = experience::find($id);
                $experience->delete();
            break;
            case "competence":
                $competence = competence::find($id);
                $competence->delete();
            break;
            case "formation":
                $formation = formation::find($id);
                $formation->delete();

            break;
            case "langage":
                $langage = langage::find($id);
                $langage->delete();
            break;

            return redirect()->route('indexCV');
        }
    }
}
