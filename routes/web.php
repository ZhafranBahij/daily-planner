<?php

use App\Livewire\Plan\PlanDaily;
use App\Livewire\Plan\PlanIndex;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware('auth')->group(function () {
        Route::get('plan', PlanIndex::class)->name('plan');
        Route::get('dashboard', PlanDaily::class)->name('dashboard');
    });

require __DIR__.'/auth.php';
