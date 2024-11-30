<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Support\Facades\Log;

class ArticleManagementController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(10);
        $articleCount = Article::count();
        return view('admin/managearticle', compact('articles', 'articleCount')); // Updated view file name
    }

    public function create()
    {
        $authors = Author::all(); // Fetch all authors
        $categories = Category::all(); //fetch all categories
        return view('articles.create', compact('authors', 'categories'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'author' => 'required|exists:users,id',
                'category' => 'required|exists:categories,id',
                'tags' => 'nullable|string',
                'date' => 'required|date',
            ]);

            // Handle image upload
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images', 'public');
            }

            // Save the article
            $article = Article::create([
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'image' => $imagePath,
                'author_id' => $request->input('author'),
                'category_id' => $request->input('category'),
                'publish_date' => $request->input('date'),
            ]);

            // Handle tags
            if ($request->filled('tags')) {
                $tags = explode(',', $request->input('tags'));
                $tagIds = [];
                foreach ($tags as $tagName) {
                    $tag = Tag::firstOrCreate(['name' => trim($tagName)]);
                    $tagIds[] = $tag->id;
                }
                $article->tags()->sync($tagIds);
            }

            return redirect()->route('managearticle')->with('success', 'Article successfully created.');
        } catch (\Exception $e) {
            Log::error('Article creation failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again.');
        }
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $article = Article::findOrFail($id);
        $article->update($request->all());
        return redirect()->route('articles.manage')->with('success', 'Article updated successfully.');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect()->route('articles.manage')->with('success', 'Article deleted successfully.');
    }
}