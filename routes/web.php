<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('homepage');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard'); // or your gallery/home for logged in users
    })->name('dashboardpage');
});

Route::get('/about', function () {
    return view('pages.about');
})->name('aboutpage');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contactpage');

use App\Http\Controllers\ContactController;

Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
Route::get('/article', function () {
    return view('pages.article');
})->name('blogpage');

Route::get('/gallery', function () {
    return view('pages.gallery');
})->name('gallerypage');