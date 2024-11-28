<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function show($id)
    {
        // Fetch the article with its author and tags
        $article = Article::with(['author', 'tags'])->findOrFail($id);

        // Pass the article to the view
        return view('articles.article', compact('article'));
    }
}
