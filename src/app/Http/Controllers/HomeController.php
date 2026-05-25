<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Skill;
use App\Models\ProjectAkhir;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $profile = Profile::first();
        $skills = Skill::where('enabled', true)->orderBy('order')->get();
        $projects = ProjectAkhir::where('visible', true)->orderByDesc('featured')->orderBy('order')->get();

        return view('welcome', compact('profile','skills','projects'));
    }
}
