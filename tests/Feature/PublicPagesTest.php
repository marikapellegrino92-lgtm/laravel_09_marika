<?php

use App\Models\Movie;

test('the public pages render successfully', function (string $url, string $expected) {
    $this->get($url)
        ->assertOk()
        ->assertSee($expected);
})->with([
    ['/', 'Welcome to MovieMania'],
    ['/chi-siamo', 'Mario'],
    ['/chi-siamo/detail/Mario', 'Senior Manager'],
    ['/contatti', 'Contattaci'],
    ['/movies', 'tutti i nostri film'],
    ['/movie/detail/1', 'Incontri ravvicinati del terzo tipo'],
]);

test('the movie views live in the movie folder', function (string $view) {
    expect(view()->exists($view))->toBeTrue();
})->with([
    'movie.movies',
    'movie.movie-detail',
]);

test('unknown movie returns not found', function () {
    $this->get('/movie/detail/999')->assertNotFound();
});

test('movie detail renders when optional fields are empty', function () {
    $movie = Movie::create([
        'title' => 'Film senza dettagli opzionali',
        'director' => 'Regista di test',
        'year' => '2026',
        'plot' => 'Trama di test',
        'genres' => null,
        'img' => null,
    ]);

    $this->get(route('movie.detail', $movie))
        ->assertOk()
        ->assertSee('Genere: sconosciuto')
        ->assertSee('/media/poster/default.jpg');
});
