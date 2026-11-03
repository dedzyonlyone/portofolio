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
        $hardSkills = Skill::where('type', 'hard')->get();
        $softSkills = Skill::where('type', 'soft')->get();
        $projects = Project::latest()->get();
        $hobbies = Hobby::all();

        return view('portfolio.index', compact('profile', 'hardSkills', 'softSkills', 'projects', 'hobbies'));
    }
}