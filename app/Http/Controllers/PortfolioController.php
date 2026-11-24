<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Hobby;

class PortfolioController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        
        // Ambil skills dan kelompokkan berdasarkan kategori (frontend, backend, dll)
        $skills = Skill::all()->groupBy(function($skill) {
            return $skill->category ?? 'lainnya';
        });

        // Ambil 3 project terbaru untuk featured
        $featuredProjects = Project::latest()->take(3)->get();

        return view('dashboard', compact('profile', 'skills', 'featuredProjects'));
    }
}