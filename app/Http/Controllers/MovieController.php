<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function movieList()
    {
        $movies = Movie::orderBy('id')->get();

        return view('movie.movies', ['movies' => $movies]);
    }

   
    public function create()
    {
        return view('movie.create');
    }

    // Salvataggio nel DB dei dati inseriti dall'utente tramite form
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'director' => ['required', 'string', 'max:255'],
            'year' => ['required', 'string', 'max:20'],
            'plot' => ['required', 'string'],
        ]);

        Movie::create($validated);

       
        return redirect()->route('movie.list')->with('success', 'Film inserito con successo!');
    }
}