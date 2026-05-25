<?php

use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TopUpPaymentController;
use App\Models\PortfolioProfile;
use App\Models\PortfolioSkill;
use App\Models\ProjectAkhir;
use App\Models\SocialLink;

/* NOTE: Do Not Remove
/ Livewire asset handling if using sub folder in domain
*/

Livewire::setUpdateRoute(function ($handle) {
    return Route::post(config('app.asset_prefix') . '/livewire/update', $handle);
});

Livewire::setScriptRoute(function ($handle) {
    return Route::get(config('app.asset_prefix') . '/livewire/livewire.js', $handle);
});
/*
/ END
*/
Route::get('/', function () {
    return view('welcome', [
        'profile' => PortfolioProfile::current(),
        'skills' => PortfolioSkill::query()->where('is_active', true)->orderBy('sort_order')->get(),
        'projects' => ProjectAkhir::query()->published()->ordered()->get(),
        'heroSocials' => SocialLink::query()->where('is_active', true)->whereIn('placement', ['hero', 'both'])->orderBy('sort_order')->get(),
        'contactSocials' => SocialLink::query()->where('is_active', true)->whereIn('placement', ['contact', 'both'])->orderBy('sort_order')->get(),
    ]);
});

Route::post('/contact', [ContactController::class, 'store'])->name('contact.send');
Route::post('/topups', [TopUpPaymentController::class, 'store'])->name('topups.store');
