<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Project;
use App\File;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

/**
 * classe d'administration des projets
 * @author Tristan Lefèvre
 * @version 1.0
 */
class AdminProjectController extends Controller
{
    /**
     * Liste les projets existants
     * @return view page AdminProject, page d'administration des projets
     */
    public function indexProject() {
        $projects = DB::table('projects')->select('project_id','titre','short_description')->get();
        return view('adminProject', ['projects' => $projects]);
    }

    /**
     * Affiche le formulaire de création du nouveau projet
     * @return view page adminProjectForm, le formulaire de création du projet
     */
    public function createproject() {
        return view('adminProjectForm');
    }

    /**
     * Poste le nouveau projet
     * @return view redirection vers la page d'administration
     */
    public function confirmCreateproject(Request $request) {
        $file = $request->file('new_images');
        $path = $file->storeAs('photos', $file->getClientOriginalName());

        $project = new Project();
        $project->titre = $request->new_titre;
        $project->short_description = $request->new_short_description;
        $project->description = $request->new_description;
        $project->image = $request->new_images->getClientOriginalName();
        $project->save();
        return redirect()->route('indexProject');
    }

    /**
     * Affiche le formulaire de modification du projet
     * @return view AdminProjectForm, le formulaire de modification de projet
     */
    public function modifyproject($id) {
        $project = DB::table('projects')->where('project_id', $id)->first();
        return view('adminProjectForm', ['project' => $project]);
    }

    /**
     * Poste les mise à jours du projets
     * @return view redirection vers la page d'administration
     */
    public function ConfirmModifyProject(Request $request) {
        $file = $request->file('images');
        $project = project::find($request->project_id);
        $file->storeAs('/', $file->getClientOriginalName(), 'photos');
        $project->update(['titre' => $request->titre, 'short_description' => $request->short_description, 'description' => $request->description, 'image' => $request->images->getClientOriginalName()]);
        return redirect()->route('indexProject');
    }

    /**
     * Supprime le projet séléctionné
     * @return view redirige vers la page d'administration
     */
    public function removeProject($id, Request $request) {
        $project = project::find($id)->delete();
        return back();
    }
}
