<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function getRecommendations(Request $request)
    {
        $movieName = $request->input('movie_name');

        // Flask API'ye HTTP POST isteği gönder
        $response = Http::post('http://127.0.0.1:5000/recommend', [
            'movie_name' => $movieName,
        ]);

        // Flask'tan gelen JSON yanıtını kontrol et
        if ($response->successful()) {
            $recommendedMovies = $response->json();
        } else {
            return back()->withErrors(['movie_name' => 'Bu film veritabanımızda bulunamadı.']);
        }

        // Laravel'de bu veriyi işleyin ve Blade şablonuna gönderin
        return view('recommendations', compact('recommendedMovies'));
    }

    public function showRecommendationsForm()
    {
        return view('recommendations');
    }
}


