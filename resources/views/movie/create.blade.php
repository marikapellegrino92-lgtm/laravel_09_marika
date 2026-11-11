<x-layout>
<div class="container-fluid">
    <div class="row">
        <h2>inserisci il tuo film preferito:</h2>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <form method="POST" action="{{ route('movie.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">titolo:</label>
                    <input type="text" name="title" class="form-control" id="title" aria-describedby="titleHelp" required>
                    <div id="titleHelp" class="form-text">Inserisci il titolo del film.</div>
                </div>
                <div class="mb-3">
                    <label for="director" class="form-label">regista:</label>
                    <input type="text" name="director" class="form-control" id="director" aria-describedby="directorHelp" required>
                    <div id="directorHelp" class="form-text">Inserisci il nome del regista.</div>
                </div>
                <div class="mb-3">
                    <label for="year" class="form-label">anno:</label>
                    <input type="text" name="year" class="form-control" id="year" aria-describedby="yearHelp" required>
                    <div id="yearHelp" class="form-text">Inserisci l'anno di uscita del film.</div>
                </div>
                <div class="mb-3">
                    <label for="plot" class="form-label">trama:</label>
                    <textarea class="form-control" name="plot" id="plot" aria-describedby="plotHelp" rows="4" required></textarea>
                    <div id="plotHelp" class="form-text">Inserisci la trama del film.</div>
                </div>
              
                <button type="submit" class="btn btn-primary">inserisci il tuo film</button>
            </form>
        </div>
    </div>
</div>
</x-layout>