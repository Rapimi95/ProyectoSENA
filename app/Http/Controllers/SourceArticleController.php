<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SourceArticle;

class SourceArticleController extends Controller
{
    public function index()
    {
        $sourceArticles = SourceArticle::orderBy('title')->paginate(15);

        return view('sourceArticles', compact('sourceArticles'));
    }

    public function store(Request $request)
    {
        try {
            $sourceArticle = new SourceArticle();
            
            $sourceArticle->title = $request->title;
            $sourceArticle->subject = $request->subject;
            $sourceArticle->url = $request->url;
            $sourceArticle->author = $request->author;
            $sourceArticle->state = $request->state;  
            $sourceArticle->type = $request->type;
            $sourceArticle->content = $request->content;
            $sourceArticle->year = $request->year;
            $sourceArticle->country = $request->country;
            $sourceArticle->result = $request->result;
            $sourceArticle->summary = $request->summary;
            $sourceArticle->classification = $request->classification;
            
            $sourceArticle->save();
        } catch (\Throwable $th) {
            throw $th;
        }

        return redirect('/articulos-fuente');
    }

    public function update(Request $request, $id)
    {
        try {
            $sourceArticle = SourceArticle::findOrFail($id);

            $sourceArticle->title = $request->title;
            $sourceArticle->subject = $request->subject;
            $sourceArticle->url = $request->url;
            $sourceArticle->author = $request->author;
            $sourceArticle->state = $request->state;
            $sourceArticle->type = $request->type;
            $sourceArticle->content = $request->content;
            $sourceArticle->year = $request->year;
            $sourceArticle->country = $request->country;
            $sourceArticle->result = $request->result;
            $sourceArticle->summary = $request->summary;
            $sourceArticle->classification = $request->classification;
            
            $sourceArticle->save();
        } catch (\Throwable $th) {
            throw $th;
        }

        return redirect('/articulos-fuente');
    }

    public function destroy($id)
    {
        try {
            $sourceArticle = SourceArticle::findOrFail($id);
            $sourceArticle->delete();
        } catch (\Throwable $th) {
            throw $th;
        }

        return redirect('/articulos-fuente');
    }

    public function search($query)
    {
        try {
            $sourceArticles = SourceArticle::where('title', 'LIKE', "%$query%")->get();
            
            return $sourceArticles;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function find($query)
    {
        try {
            $sourceArticle = SourceArticle::where('id', $query)->firstOrFail();
            $projects = $sourceArticle->projects()->orderBy('name')->get();

            return compact('sourceArticle', 'projects');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
