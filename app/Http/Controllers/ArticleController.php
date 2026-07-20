<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(): View
    {
        $articles = Article::where('is_published', true)
            ->with('category')
            ->latest('published_at')
            ->paginate(9);

        return view('articles.index', compact('articles'));
    }

    public function show(Article $article): View
    {
        $article->load('category', 'author');

        return view('articles.show', compact('article'));
    }
}