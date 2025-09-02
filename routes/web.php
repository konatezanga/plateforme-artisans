<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;

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
