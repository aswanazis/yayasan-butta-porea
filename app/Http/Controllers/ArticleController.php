<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(Request $request): View
    {
        $locale = app()->getLocale();

        $query = Article::where('is_published', true)
            ->with('category')
            ->latest('published_at');

        if ($request->filled('search')) {
            $query->where('title->' . $locale, 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $articles = $query->paginate(9)->appends($request->query());

        $categories = Category::orderBy('name')->get();

        return view('articles.index', compact('articles', 'categories'));
    }

    public function show(Article $article): View
    {
        $relatedArticles = Article::where('is_published', true)
            ->where('id', '!=', $article->id)
            ->when($article->category_id, function ($q) use ($article) {
                $q->where('category_id', $article->category_id);
            })
            ->latest('published_at')
            ->take(3)
            ->get();

        if ($relatedArticles->count() < 3) {
            $more = Article::where('is_published', true)
                ->where('id', '!=', $article->id)
                ->whereNotIn('id', $relatedArticles->pluck('id'))
                ->latest('published_at')
                ->take(3 - $relatedArticles->count())
                ->get();
            $relatedArticles = $relatedArticles->concat($more);
        }

        return view('articles.show', compact('article', 'relatedArticles'));
    }
}