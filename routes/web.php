<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\Management\CreateInterviewController;
use App\Http\Controllers\Management\InterviewManagementController;
use App\Http\Controllers\Management\JobPostManagementController;
use App\Livewire\Auth\CompanyProfileEditForm;
use App\Livewire\Auth\ProfileEditForm;
use App\Livewire\Interview\CreateInterview;
use App\Models\JobPost;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', ['jobPosts' => JobPost::with('company')->get()]);
})->name('home');

Route::get('/api/company', CompanyController::class)->name('api.company');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/job-post/{jobPost}', [JobPostController::class, 'show'])->name('job-post.show');

    Route::middleware(['role:company'])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::name('management.')->prefix('management/')->group(function () {
            Route::resource('job-post', JobPostManagementController::class);

            Route::get('job-post/{jobPost}/applicant/{user}', [JobPostManagementController::class, 'showApplicant'])
                ->name('job-application.show');

            Route::get('job-post-archived', [JobPostManagementController::class, 'archived'])
                ->name('job-post.archived');

            Route::get('job-application/{jobApplication}/interview/create', CreateInterviewController::class)
                ->name('job-application.interview.create');
            Route::resource('interview', InterviewManagementController::class);

            Route::get('profile', [CompanyProfileEditForm::class,'render'])->name('profile');
        });
    });

    Route::middleware(['role:employee'])->group(function () {
        Route::resource('/job-application', JobApplicationController::class);
        Route::resource('/interview', InterviewController::class);
        Route::get('profile', [ProfileEditForm::class,'render'])->name('profile');

    });
});


require __DIR__ . '/auth.php';
