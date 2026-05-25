<?php

namespace App\Http\Controllers;

use App\Models\PortfolioProfile;
use App\Models\PortfolioSkill;
use App\Models\ProjectAkhir;
use App\Models\SocialLink;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('welcome', [
            'profile' => PortfolioProfile::current(),
            'skills' => PortfolioSkill::query()->where('is_active', true)->orderBy('sort_order')->get(),
            'projects' => ProjectAkhir::query()->published()->ordered()->get(),
            'heroSocials' => SocialLink::query()->where('is_active', true)->whereIn('placement', ['hero', 'both'])->orderBy('sort_order')->get(),
            'contactSocials' => SocialLink::query()->where('is_active', true)->whereIn('placement', ['contact', 'both'])->orderBy('sort_order')->get(),
        ]);
    }
}
