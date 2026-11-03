<?php

use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\HobbyController;
use Illuminate\Support\Facades\Route;

// Route publik (user)
Route::get('/', [PortfolioController::class, 'index'])->name('portfolio.index');

// TAMBAHKAN INI — buat redirect setelah login Breeze
Route::get('/dashboard', function () {
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return redirect('/');
})->middleware('auth')->name('dashboard');

// Route admin
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('profile', ProfileController::class);
    Route::resource('skills', SkillController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('hobbies', HobbyController::class);
});

require __DIR__.'/auth.php';