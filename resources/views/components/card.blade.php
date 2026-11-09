<div class="card mb-3" style="width: 18rem;">
    <img src="https://picsum.photos/200/300" class="card-img-top cardImg" alt="poster di {{ $movie['title'] }}">
    
    <div class="card-body">
        <h5 class="card-title">{{ $movie['title'] }}</h5>
        <h6 class="card-subtitle text-muted">{{ $movie['director'] }}</h6>

        <p class="card-text">{{ $movie['genres'] ?? 'sconosciuto' }}</p>

        <a href="{{ route('movie.detail', $movie['id']) }}" class="btn btn-primary">leggi di più</a>
    </div>
</div>
