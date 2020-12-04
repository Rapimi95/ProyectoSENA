<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('name')
        ->get();

        return view('projects', compact('projects'));
    }

    public function store(Request $request)
    {
        try {
            $project = new Project();
            
            $project->name = $request->name;
            $project->category = $request->category;
            $project->description = $request->description;
            
            $project->save();
        } catch (\Throwable $th) {
            throw $th;
        }

        return redirect('/proyectos');
    }

    public function update(Request $request, $id)
    {
        try {
            $project = Project::findOrFail($id);

            $project->name = $request->name;
            $project->category = $request->category;
            $project->description = $request->description;
            
            $project->save();
        } catch (\Throwable $th) {
            throw $th;
        }

        return redirect('/proyectos');
    }

    public function destroy($id)
    {
        try {
            $project = Project::findOrFail($id);
            $project->delete();
        } catch (\Throwable $th) {
            throw $th;
        }

        return redirect('/proyectos');
    }
}
