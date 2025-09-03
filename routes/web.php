<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\ArtisanAuthController;

// Routes d'authentification admin
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    
    // Routes protégées
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard');
    });
});
// Redirection pour la route 'login' vers 'admin.login'
Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');




// Route par public
Route::get('/', function () {
    return view('index');
});


// Routes pour les artisans
Route::prefix('artisan')->group(function () {
    // Inscription
    Route::get('inscription', [ArtisanAuthController::class, 'showRegisterForm'])->name('artisan.inscription');
    Route::post('inscription', [ArtisanAuthController::class, 'register'])->name('artisan.register');
    
    // Connexion
    Route::get('connexion', [ArtisanAuthController::class, 'showLoginForm'])->name('artisan.connexion');
    Route::post('connexion', [ArtisanAuthController::class, 'login'])->name('artisan.login');
    
    // Déconnexion
    Route::post('deconnexion', [ArtisanAuthController::class, 'logout'])->name('artisan.logout');
    
    // Routes protégées
    Route::middleware(['auth'])->group(function () {
        Route::get('dashboard', function () {
            return view('espace-artisan');
        })->name('artisan.dashboard');
    });
});

// Redirections pour les URLs simples
Route::get('inscription', function () {
    return redirect()->route('artisan.inscription');
});

Route::get('connexion', function () {
    return redirect()->route('artisan.connexion');
});

Route::get('deconnexion', function () {
    return redirect()->route('artisan.logout');
});
