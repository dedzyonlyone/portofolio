<?php

use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\HobbyController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController as PublicProjectController;
use Illuminate\Support\Facades\Route;

// ==========================================
// RUTE PUBLIK (USER)
// ==========================================
Route::get('/', [PortfolioController::class, 'index'])->name('home');

// Kontak
Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Projects User (Dikasih nama 'public.projects' biar nggak tabrakan)
Route::get('/projects', [PublicProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{project}', [PublicProjectController::class, 'show'])->name('projects.show');


// ==========================================
// RUTE ADMIN (DASHBOARD)
// ==========================================
Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('profile', ProfileController::class);
    Route::resource('skills', SkillController::class);
    
    // Ini yang tadi bikin masalah, sekarang udah aman
    Route::resource('projects', ProjectController::class);
    
    Route::resource('hobbies', HobbyController::class);
    Route::resource('contacts', AdminContactController::class)->only(['index', 'show', 'destroy']);
});

require __DIR__.'/auth.php';