<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function index(): View
    {
        $galleries = Gallery::with(['photos', 'program'])
            ->latest()
            ->paginate(9);

        return view('galleries.index', compact('galleries'));
    }

    public function show(Gallery $gallery): View
    {
        $gallery->load(['photos' => function ($query) {
            $query->latest();
        }, 'program']);

        return view('galleries.show', compact('gallery'));
    }
}