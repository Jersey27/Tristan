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
/**
 *  @author Tristan
 *  @version 1
 *  @package App\Http\Controllers
 *  
 *  Cette classe gère l'intégralité des fonctions du CMS.
 *  @todo ?
 *  plusieurs classes par page du CMS, le tout réunis dans un namespace spécifique.
 *  !
 */
class AdminController extends Controller
{
    /**
     * Fonction de la page d'acceuil du CMS
     * @return view vue de la page d'acceuil
     */
    public function home() {
        return view('adminHome',['message' => 0]);
    }
    /**
     * Fonction de la page de modification du
     */
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
    public function modifyHome(Request $request) {
        return back();
    }
    public function modifyproject($id) {
        $project = DB::table('projects')->where('project_id', $id)->first();
        return view('adminProjectForm', ['project' => $project]);
    }
    public function ConfirmModifyProject(Request $request) {
        $file = $request->file('images');
        $project = project::find($request->project_id);
        $file->storeAs('/', $file->getClientOriginalName(), 'photos');
        $project->update(['titre' => $request->titre, 'short_description' => $request->short_description, 'description' => $request->description, 'image' => $request->images->getClientOriginalName()]);
        return redirect()->route('indexProject');
    }
    public function removeProject($id, Request $request) {
        $project = project::find($id);
        return back();
    }
}
