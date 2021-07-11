<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ResultingArticle;

class ResultingArticleController extends Controller
{
    public function index()
    {
        $resultingArticles = ResultingArticle::orderBy('title')->get();

        return view('resultingArticles', compact('resultingArticles'));
    }

    public function store(Request $request)
    {
        try {
            $resultingArticle = new ResultingArticle();
            
            $resultingArticle->title = $request->title;
            $resultingArticle->subject = $request->subject;
            $resultingArticle->url = $request->url;
            $resultingArticle->author = $request->author;
            $resultingArticle->state = $request->state;
            $resultingArticle->type = $request->type;
            $resultingArticle->content = $request->content;
            $resultingArticle->year = $request->year;
            $resultingArticle->country = $request->country;
            $resultingArticle->result = $request->result;
            $resultingArticle->summary = $request->summary;
            $resultingArticle->classification = $request->classification;
            
            $resultingArticle->save();
        } catch (\Throwable $th) {
            throw $th;
        }

        return redirect('/articulos-resultantes');
    }

    public function update(Request $request, $id)
    {
        try {
            $resultingArticle = ResultingArticle::findOrFail($id);

            $resultingArticle->title = $request->title;
            $resultingArticle->subject = $request->subject;
            $resultingArticle->url = $request->url;
            $resultingArticle->author = $request->author;
            $resultingArticle->state = $request->state;
            $resultingArticle->type = $request->type;
            $resultingArticle->content = $request->content;
            $resultingArticle->year = $request->year;
            $resultingArticle->country = $request->country;
            $resultingArticle->result = $request->result;
            $resultingArticle->summary = $request->summary;
            $resultingArticle->classification = $request->classification;
            
            $resultingArticle->save();
        } catch (\Throwable $th) {
            throw $th;
        }

        return redirect('/articulos-resultantes');
    }

    public function destroy($id)
    {
        try {
            $resultingArticle = ResultingArticle::findOrFail($id);
            $resultingArticle->delete();
        } catch (\Throwable $th) {
            throw $th;
        }

        return redirect('/articulos-resultantes');
    }
    
    public function search($query)
    {
        try {
            $resultingArticles = ResultingArticle::where('title', 'LIKE', "%$query%")->get();
            
            return $resultingArticles;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function find($query)
    {
        try {
            $resultingArticle = ResultingArticle::where('id', $query)->firstOrFail();
            $project = $resultingArticle->project()->orderBy('name')->get();

            return compact('resultingArticle', 'project');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
