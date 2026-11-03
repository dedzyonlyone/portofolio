<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Hobby;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'profile' => Profile::count(),
            'skills' => Skill::count(),
            'projects' => Project::count(),
            'hobbies' => Hobby::count(),
        ];
        return view('admin.dashboard', compact('stats'));
    }
}