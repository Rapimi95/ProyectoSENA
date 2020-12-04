<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('title')
        ->get();

        return view('articles', compact('articles'));
    }

    public function store(Request $request)
    {
        try {
            $article = new Article();
            
            $article->title = $request->title;
            $article->subject = $request->subject;
            $article->url = $request->url;
            $article->author = $request->author;
            $article->state = $request->state;
            $article->type = $request->type;
            $article->content = $request->content;
            $article->year = $request->year;
            $article->country = $request->country;
            $article->result = $request->result;
            $article->summary = $request->summary;
            $article->classification = $request->classification;
            
            $article->save();
        } catch (\Throwable $th) {
            throw $th;
        }

        return redirect('/articulos');
    }

    public function update(Request $request, $id)
    {
        try {
            $article = Article::findOrFail($id);

            $article->title = $request->title;
            $article->subject = $request->subject;
            $article->url = $request->url;
            $article->author = $request->author;
            $article->state = $request->state;
            $article->type = $request->type;
            $article->content = $request->content;
            $article->year = $request->year;
            $article->country = $request->country;
            $article->result = $request->result;
            $article->summary = $request->summary;
            $article->classification = $request->classification;
            
            $article->save();
        } catch (\Throwable $th) {
            throw $th;
        }

        return redirect('/articulos');
    }

    public function destroy($id)
    {
        try {
            $article = Article::findOrFail($id);
            $article->delete();
        } catch (\Throwable $th) {
            throw $th;
        }

        return redirect('/articulos');
    }
}
