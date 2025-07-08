<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\frontend\FrontEndController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\TestimonyController;

Route::get('/', [FrontEndController::class, 'index']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('certificates', CertificateController::class);
    Route::resource('testymoni', TestimonyController::class);
    Route::resource('contact', ContactController::class);
    Route::resource('shop', ShopController::class);
});
