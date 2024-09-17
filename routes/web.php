<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\ProfileController;
use App\Models\JobPost;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', ['jobPosts' => JobPost::with('company')->get()]);
})->name('home');

Route::get('/api/company', CompanyController::class)->name('api.company');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware(['role:company'])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
        Route::get('/job-post', JobPostController::class);

        Route::resource('management/job-post', JobPostController::class);
        Route::get('management/job-post-restore/{id}', [JobPostController::class, 'restore'])
            ->name('management.job-post.restore');
        Route::get('management/job-post-archived', [JobPostController::class, 'archived'])
            ->name('management.job-post.archived');
    });

    Route::middleware(['role:employee'])->group(function () {
        Route::resource('/job-application', JobApplicationController::class);
        Route::resource('/interview', InterviewController::class);
    });
});




require __DIR__ . '/auth.php';
