<?php

namespace App\Http\Controllers;

use App\Models\EducationalMaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class EducationalMaterialController extends Controller
{
    public function index(Request $request): View
    {
        $locale = app()->getLocale();

        $query = EducationalMaterial::where('is_active', true)->latest();

        if ($request->filled('search')) {
            $query->where('title->' . $locale, 'like', '%' . $request->search . '%');
        }

        $materials = $query->paginate(9)->appends($request->query());

        return view('materials.index', compact('materials'));
    }

    public function show(EducationalMaterial $material): View
    {
        abort_unless($material->is_active, 404);

        return view('materials.show', compact('material'));
    }

    public function download(EducationalMaterial $material): StreamedResponse
    {
        abort_unless($material->is_active, 404);

        $material->increment('downloads_count');

        $filename = Str::slug($material->title) . '.pdf';

        return Storage::disk('public')->download($material->file_path, $filename);
    }
}