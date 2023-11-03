<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\URLController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



Route::name("urlshortner.")->prefix("urlshortner")->middleware('auth')->group(function () {

    Route::get('/', [URLController::class, 'index'])->name('index');
    Route::post('/shorten', [URLController::class, 'store'])->name('shorten');
});


Route::get('/{url:slug}',[URLController::class,'redirect'])->name('redirect')
->middleware("counturlclick");

