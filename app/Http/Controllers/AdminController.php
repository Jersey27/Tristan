<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use App\competence;
use App\experience;
use App\formation;
use App\langage;
use App\Project;
use App\File;

use App\Http\Requests\ProjetRequest;

class AdminController extends Controller
{
    public function home() {
        return view('adminHome',['message' => 0]);
    }
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
    public function indexContact() {
        $contacts = DB::table('contacts')->select('id','name', 'mail', 'subject')->get();
        return view('adminContact', ['contacts' => $contacts]);
    }
    public function indexProject() {
        $projects = DB::table('projects')->select('project_id','titre','short_description')->get();
        return view('adminProject', ['projects' => $projects]);
    }
    public function showmessage($id) {
        $contact = DB::table('contacts')->where('id', $id)->first();
        return view('adminContactMessage',['contact' => $contact]);
    }
    public function addcv(Request $request) {
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

            return redirect()->view('adminCV');
        }
    }
    public function confirmCreateproject(ProjetRequest $request) {
        $file = $request->file('images');
        $path = $file->storeAs('photos', $file->getClientOriginalName());

        $project = new Project();
        $project->titre = $request->titre;
        $project->short_description = $request->short_description;
        $project->description = $request->description;
        $project->images = $request->image->getClientOriginalName();
        $project->save();
        return redirect()->route('indexProject');
    }
    public function createproject() {
        return view('adminProjectForm');
    }
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
                $competence->update(['titre'=> $request->titre, 'progres' => $request->progres, 'description' => $request->description]);

            break;
            case "formation":
                $formation = formation::find($request->id);
                $formation->update(['titre'=> $request->titre, 'date' => $request->date,'image' => $request->image, 'description' => $request->description]);
            break;
            case "langage":
                $langage = langage::find($request->id);
                $langage->update(['titre'=> $request->titre, 'niveau' => $request->niveau, 'description' => $request->description]);
            break;

            return redirect()->back();
        }
    }
    public function modifyproject($id) {
        $project = DB::table('projects')->where('project_id', $id)->first();
        return view('adminProjectForm', ['project' => $project]);
    }
    public function ConfirmModifyProject(Request $request) {
        $file = $request->file('images');
        $project = project::find($request->project_id);
        $path = $file->storeAs('photos', $file->getClientOriginalName());
        $project->update(['titre' => $request->titre, 'short_description' => $request->short_description, 'description' => $request->description, 'image' => $request->images->getClientOriginalName()]);
        return redirect()->route('indexProject');
    }
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

            return redirect()->back();
        }
    }
    public function removeProject($id, Request $request) {
        $project = project::find($id);
        return back();
    }
}
