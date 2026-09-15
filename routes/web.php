<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/profil', function () {
    return view('pages.about');
})->name('about');

Route::get('/competences', function () {
    return view('pages.skills');
})->name('skills');

Route::get('/services', function () {
    return view('pages.services');
})->name('services');

Route::get('/projets', function () {
    return view('pages.projects');
})->name('projects');

Route::get('/parcours', function () {
    return view('pages.timeline');
})->name('timeline');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');
    
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

// Basic back-office route
Route::prefix('admin')->group(function () {
    Route::get('/contacts', [ContactController::class, 'index'])->name('admin.contacts');
});
