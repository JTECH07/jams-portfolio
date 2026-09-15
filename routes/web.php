<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;

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

// Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{post}', [BlogController::class, 'show'])->name('blog.show');
Route::post('/blog/subscribe', [BlogController::class, 'subscribe'])->name('blog.subscribe');

// Comments & Ratings
Route::post('/comment', [CommentController::class, 'storeComment'])->name('comment.store');
Route::post('/rating', [CommentController::class, 'storeRating'])->name('rating.store');

// Basic back-office route
Route::prefix('admin')->group(function () {
    Route::get('/contacts', [ContactController::class, 'index'])->name('admin.contacts');
});
