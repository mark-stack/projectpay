<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//Frontend
Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'landing')->name('landing');
});

//Authenticated & Verified
Route::middleware(['auth', 'verified'])->group(function () {
    //Dashboard
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    //Users
    Route::resource('users', UserController::class)->only([
        'index'
    ]);

    //Projects
    Route::resource('projects', ProjectController::class);

    //Companies
    Route::resource('companies', CompanyController::class);
});

//Admin
Route::middleware(['auth','admin'])->group(function () {
    //Login as user
    Route::get('/login-as-user/{id}', [AdminController::class, 'loginAsUser'])->name('admin.login.as.user');
});

//Authenticated only (not verified)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Auth routes
require __DIR__.'/auth.php';
