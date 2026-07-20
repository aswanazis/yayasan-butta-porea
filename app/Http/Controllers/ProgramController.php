<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\View\View;

class ProgramController extends Controller
{
    public function index(): View
    {
        $programs = Program::where('is_active', true)
            ->latest()
            ->paginate(9);

        return view('programs.index', compact('programs'));
    }

    public function show(Program $program): View
    {
        $program->load('galleries.photos');

        return view('programs.show', compact('program'));
    }
}