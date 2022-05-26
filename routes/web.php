<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'frontend.home.index');

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

Auth::routes(['register' => false]);

Route::middleware(['auth'])->group(function () {
    Route::resources([
        'banners' => BannerController::class,
    ]);
});
