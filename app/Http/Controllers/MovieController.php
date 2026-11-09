<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    private function ensureSampleMovies(): void
    {
        if (Movie::count() > 0) {
            return;
        }

        Movie::create([
            'title' => 'Incontri ravvicinati del terzo tipo',
            'director' => 'S. Spielberg',
            'year' => '1977',
            'plot' => 'Un film di fantascienza classico e iconico.',
            'genres' => 'sci-fi',
            'img' => '/media/poster/spielberg.jpg',
        ]);
    }

    public function movieList()
    {
        $this->ensureSampleMovies();

        $movies = Movie::query()
            ->orderBy('id')
            ->get()
            ->map(fn ($movie) => $movie->toArray())
            ->all();

        return view('movie.movies', ['movies' => $movies]);
    }

    public function movieDetail(int $id)
    {
        $this->ensureSampleMovies();

        $movie = Movie::findOrFail($id)->toArray();

        return view('movie.movie-detail', ['movie' => $movie]);
    }

    public function create()
    {
        return view('movie.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'director' => ['required', 'string', 'max:255'],
            'year' => ['required', 'string', 'max:20'],
            'plot' => ['required', 'string'],
        ]);

        $movie = Movie::create(array_merge($data, [
            'genres' => $request->input('genres', 'sconosciuto'),
            'img' => $request->input('img', '/media/poster/default.jpg'),
        ]));

        return redirect()->route('movie.detail', ['id' => $movie->id]);
    }
}
