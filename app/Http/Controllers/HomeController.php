<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Award;
use App\Models\FoundationProfile;
use App\Models\Gallery;
use App\Models\LegalDocument;
use App\Models\Partner;
use App\Models\Program;
use App\Models\TeamMember;
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

        $partners = Partner::where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('home', compact('programs', 'totalPrograms', 'articles', 'galleries', 'partners'));
    }

    public function about(): View
    {
        $teamMembers = TeamMember::where('is_active', true)
            ->orderBy('order')
            ->get()
            ->groupBy('group');

        $foundationProfile = FoundationProfile::current();

        $awards = Award::where('is_active', true)
            ->orderBy('order')
            ->get();

        $legalDocuments = LegalDocument::where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('about', compact('teamMembers', 'foundationProfile', 'awards', 'legalDocuments'));
    }

}