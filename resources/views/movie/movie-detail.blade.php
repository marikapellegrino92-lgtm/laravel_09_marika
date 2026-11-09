<x-layout>

    <header>
        <div class="container-fluid movies">
            <div class="row justify-content-center">
                
                <div class="col-12">
                    <h2 class="display-5 text-white text-center text-color">
                        dettagli del film: {{ $movie['title'] }}
                    </h2>
                </div>

                <div class="col-12 col-md-6 text-white d-flex flex-column justify-content-center align-items-center">
                    <h3>Titolo: {{ $movie['title'] }}</h3>
                    <h4>Regista: {{ $movie['director'] }}</h4>
                    <p>Genere: {{ $movie['genres'] ?? 'sconosciuto' }}</p>
                </div>

                <div class="col-12 col-md-6 d-flex justify-content-center">
                    <img src="{{ $movie['img'] ?? '/media/poster/default.jpg' }}" alt="poster di {{ $movie['title'] }}">
                </div>

            </div>
        </div>
    </header>

</x-layout>
