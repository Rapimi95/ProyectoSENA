<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class RelatedFileController extends Controller
{
    public function store(Request $request)
    {
        try {
            $related_file = new RelatedFile();

            $related_file->path = $request->file('avatar')->store('relatedFiles');
            $related_file->name = $request->name;
            $related_file->project_id = $request->project_id;
            
            $related_file->save();
        } catch (\Exception $e) {
            dd($e);
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
