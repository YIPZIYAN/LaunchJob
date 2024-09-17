<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\Management\JobPostManagementController;
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

    //best practice ?
    Route::get('/job-post/{jobPost}', [JobPostController::class, 'show'])->name('job-post.show');

    Route::middleware(['role:company'])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::resource('management/job-post', JobPostManagementController::class)->except('show');
        Route::get('management/job-post-archived', [JobPostManagementController::class, 'archived'])
            ->name('management.job-post.archived');
    });

    Route::middleware(['role:employee'])->group(function () {
        Route::resource('/job-application', JobApplicationController::class);
        Route::resource('/interview', InterviewController::class);
    });
});




require __DIR__ . '/auth.php';
