<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Identity;
use App\Models\Article;

class HomeController extends Controller
{
    // Method to show the home page with data
    public function index()
    {
        // Fetch the latest carousel image
        $carouselImage = Carousel::latest()->first();

        // Fetch all identity cards
        $identityCards = Identity::all();

        // Fetch the 10 latest articles
        $articles = Article::latest()->take(10)->get();

        // Return the view with the data
        return view('welcome', [
            'carouselImage' => $carouselImage,
            'identityCards' => $identityCards,
            'articles' => $articles,
        ]);
    }
}
