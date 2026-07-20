<?php

namespace App\Http\Controllers;

use App\Models\EducationalMaterial;
use Illuminate\View\View;

class EducationalMaterialController extends Controller
{
    public function index(): View
    {
        $materials = EducationalMaterial::where('is_active', true)
            ->latest()
            ->paginate(9);

        return view('materials.index', compact('materials'));
    }

    public function show(EducationalMaterial $material): View
    {
        abort_unless($material->is_active, 404);

        return view('materials.show', compact('material'));
    }
}