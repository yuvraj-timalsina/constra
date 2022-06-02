<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;

Auth::routes(['register' => false]);

Route::view('/', 'frontend.home.index')->name('home');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::resources([
        'banners' => BannerController::class,
        'categories' => CategoryController::class,
        'projects' => ProjectController::class,
    ]);
});
