<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class ProjectController extends Controller
{
    public function index() {
        $projects = DB::table('projects')->select('project_id','titre','short_description','image')->get();
        foreach ($projects as $project) {
            $project->image = Storage::disk('photos')->url($project->image);
        }
        return view('projet', ['projects' => $projects]);
    }

    public function ShowProject($id) {
        $project = DB::table('projects')->where('project_id', $id)->first();
        
        return view('projetDetail', ['project' => $project]);
    }
}
