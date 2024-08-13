<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Film Önerileri</title>
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Lato', sans-serif;
            background-color: #000;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        header {
            margin-bottom: 50px;
        }

        header h1 {
            font-size: 3em;
            margin-bottom: 20px;
            letter-spacing: 2px;
        }

        header p {
            font-size: 1.2em;
            color: #aaa;
        }

        .search-section {
            margin-bottom: 40px;
        }

        .search-section input {
            padding: 10px;
            font-size: 1em;
            border: none;
            border-radius: 5px;
            width: 300px;
            margin-right: 10px;
        }

        .search-section button {
            padding: 10px 20px;
            font-size: 1em;
            border: none;
            background-color: #ff0000;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .search-section button:hover {
            background-color: #d40000;
        }

        .recommendations {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .movie-item {
            margin: 20px;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .movie-item img {
            width: 200px;
            border-radius: 10px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .movie-item:hover {
            transform: scale(1.05);
        }

        .movie-item h3 {
            margin-top: 10px;
            font-size: 1.2em;
        }
    </style>
</head>
<body>
<!-- Header -->
<header>
    <h1>Film Öneri Sistemi</h1>
    <p>Sevdiğiniz filmlere benzer filmleri bulun</p>
</header>

<!-- Search Section -->
<section class="search-section">
    <form method="POST" action="/get-recommendations">
        @csrf
        <input type="text" id="movie_name" name="movie_name" placeholder="Film Adını Girin..." required>
        <button type="submit">Önerileri Al</button>
    </form>
</section>

<div class="movie-item">
    <img src="{{ asset(strtolower(str_replace(' ', '-', $movie)) . '.jpg') }}" alt="{{ $movie }}"
         onerror="this.onerror=null;this.src='{{ asset('default.jpg') }}';">
    <h3>{{ $movie }}</h3>
    <button class="fav-btn" onclick="addToFavorites('{{ $movie }}')">Favorilere Ekle</button>
</div>

<script>
    function addToFavorites(movie) {
        // Favori işlemi burada gerçekleştirilir.
        alert(movie + ' favorilere eklendi!');
    }
</script>



<!-- Recommendations Section -->
<section class="recommendations" id="recommendations">
    @if(isset($recommendedMovies))
        @foreach($recommendedMovies as $movie)
            <div class="movie-item">
                <img src="{{ asset(strtolower(str_replace(' ', '-', $movie)) . '.jpg') }}" alt="{{ $movie }}"
                     onerror="this.onerror=null;this.src='{{ asset('default.jpg') }}';">
                <h3>{{ $movie }}</h3>
            </div>
        @endforeach
    @else
        <p>Henüz bir film önerisi almadınız.</p>
    @endif
</section>
</body>
</html>
