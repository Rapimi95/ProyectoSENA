<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Magazine;

class MagazineController extends Controller
{
    public function index()
    {
        $magazines = Magazine::orderBy('name')
        ->get();

        return view('magazines', compact('magazines'));
    }

    public function store(Request $request)
    {
        try {
            $magazine = new Magazine();
            
            $magazine->name = $request->name;
            $magazine->issn_code = $request->issn_code;
            $magazine->category = $request->category;
            $magazine->classification = $request->classification;
            $magazine->format = $request->format;
            $magazine->thematic = $request->thematic;
            $magazine->country = $request->country;
            $magazine->city = $request->city;
            $magazine->institution = $request->institution;

            $magazine->save();
        } catch (\Throwable $th) {
            throw $th;
        }

        return redirect('/revistas');
    }

    public function update(Request $request, $id)
    {
        try {
            $magazine = Magazine::findOrFail($id);

            $magazine->name = $request->name;
            $magazine->issn_code = $request->issn_code;
            $magazine->category = $request->category;
            $magazine->classification = $request->classification;
            $magazine->format = $request->format;
            $magazine->thematic = $request->thematic;
            $magazine->country = $request->country;
            $magazine->city = $request->city;
            $magazine->institution = $request->institution;
            
            $magazine->save();
        } catch (\Throwable $th) {
            throw $th;
        }

        return redirect('/revistas');
    }

    public function destroy($id)
    {
        try {
            $magazine = Magazine::findOrFail($id);
            $magazine->delete();
        } catch (\Throwable $th) {
            throw $th;
        }

        return redirect('/revistas');
    }
}
