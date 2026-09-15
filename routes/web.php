<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminController;

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
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/contacts', [ContactController::class, 'index'])->name('admin.contacts');

    // Posts
    Route::get('/posts', [AdminController::class, 'posts'])->name('admin.posts');
    Route::get('/posts/create', [AdminController::class, 'postCreate'])->name('admin.posts.create');
    Route::post('/posts', [AdminController::class, 'postStore'])->name('admin.posts.store');
    Route::get('/posts/{post}/edit', [AdminController::class, 'postEdit'])->name('admin.posts.edit');
    Route::put('/posts/{post}', [AdminController::class, 'postUpdate'])->name('admin.posts.update');
    Route::delete('/posts/{post}', [AdminController::class, 'postDelete'])->name('admin.posts.delete');

    // Comments
    Route::get('/comments', [AdminController::class, 'comments'])->name('admin.comments');
    Route::post('/comments/{comment}/approve', [AdminController::class, 'commentApprove'])->name('admin.comments.approve');
    Route::delete('/comments/{comment}', [AdminController::class, 'commentDelete'])->name('admin.comments.delete');

    // Subscribers
    Route::get('/subscribers', [AdminController::class, 'subscribers'])->name('admin.subscribers');
});
