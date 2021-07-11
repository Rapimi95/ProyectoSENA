<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\SourceArticle;
use App\ResultingArticle;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('name')->paginate(15);
        $sourceArticles = SourceArticle::orderBy('title')->get();
        $resultingArticles = ResultingArticle::orderBy('title')->get();

        return view('projects', compact('projects', 'sourceArticles', 'resultingArticles'));
    }

    public function store(Request $request)
    {
        try {
            $project = new Project();
            
            $project->name = $request->name;
            $project->category = $request->category;
            $project->description = $request->description;
            
            $project->save();
            return redirect('/proyectos');
        } catch (\Exception $e) {
            dd($e);
        }

    }

    public function update(Request $request, $id)
    {
        try {
            $project = Project::findOrFail($id);

            $project->name = $request->name;
            $project->category = $request->category;
            $project->description = $request->description;
            
            $project->save();

            return redirect('/proyectos');
        } catch (\Throwable $th) {
            throw $th;
        }

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

    public function search($query)
    {
        try {
            $projects = Project::where('name', 'LIKE', "%$query%")->get();
            
            return $projects;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function find($query)
    {
        try {
            $project = Project::where('id', $query)->firstOrFail();
            $sourceArticles = $project->sourceArticles()->orderBy('title')->get();
            $resultingArticles = $project->resultingArticles()->orderBy('title')->get();

            return compact('project', 'sourceArticles', 'resultingArticles');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function attachSourceArticle(Request $request)
    {
        try {
            $project = Project::findOrFail($request->projectId);
            $project->sourceArticles()->attach($request->sourceArticleId);

            return redirect('/proyectos');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    
    public function attachResultingArticle(Request $request)
    {
        try {
            $project = Project::findOrFail($request->projectId);
            $resultingArticle = ResultingArticle::findOrFail($request->resultingArticleId);
            $project->resultingArticles()->save($resultingArticle);
            
            return redirect('/proyectos');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
