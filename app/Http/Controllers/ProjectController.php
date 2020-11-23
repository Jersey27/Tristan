<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

/**
 * Classe publique des projets
 * @author Tristan Lefèvre
 * @version 1.0
 */
class ProjectController extends Controller
{
    /**
     * Liste les projets
     * @return view projet, la page listant les projets
     */
    public function index() {
        $projects = DB::table('projects')->select('project_id','titre','short_description','image')->get();
        foreach ($projects as $project) {
            $project->image = Storage::disk('photos')->url($project->image);
        }
        return view('projet', ['projects' => $projects]);
    }

    /**
     * Montre le projet séléctionné
     * @return view projet
     */
    public function ShowProject($id) {
        $project = DB::table('projects')->where('project_id', $id)->first();
        
        return view('projetDetail', ['project' => $project]);
    }
}
