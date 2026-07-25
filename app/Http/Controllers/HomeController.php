<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Gallery;
use App\Models\Program;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $programs = Program::where('is_active', true)
            ->latest()
            ->take(3)
            ->get();

        $totalPrograms = Program::where('is_active', true)->count();


        $articles = Article::where('is_published', true)
            ->latest('published_at')
            ->take(3)
            ->get();

        $galleries = Gallery::with('photos')
            ->latest()
            ->take(4)
            ->get();

        return view('home', compact('programs', 'totalPrograms', 'articles', 'galleries'));
    }

    public function about(): View
{
    return view('about');
}

}