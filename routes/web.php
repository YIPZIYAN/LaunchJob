<?php

use App\Http\Controllers\JobPostController;
use App\Http\Controllers\ProfileController;
use App\Models\JobPost;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome',['jobPosts'=> JobPost::with('company')->get()]);
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/job-post', JobPostController::class);
    Route::get('/job-post-restore/{id}', [JobPostController::class, 'restore'])->name('job-post.restore');
    Route::get('/job-post-archived', [JobPostController::class, 'archived'])->name('job-post.archived');

});

require __DIR__ . '/auth.php';
