<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Project;
use App\File;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminProjectController extends Controller
{
    public function indexProject() {
        $projects = DB::table('projects')->select('project_id','titre','short_description')->get();
        return view('adminProject', ['projects' => $projects]);
    }

    public function createproject() {
        return view('adminProjectForm');
    }

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
        $project = project::find($id)->delete();
        return back();
    }
}
