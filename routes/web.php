<?php

use App\Http\Controllers\ApplicantXMLController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\Management\CreateInterviewController;
use App\Http\Controllers\Management\InterviewManagementController;
use App\Http\Controllers\Management\JobPostManagementController;
use App\Http\Controllers\Management\SendOfferLetterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SkillTestController;
use App\Http\Controllers\WebService\EventController;
use App\Http\Controllers\WebService\RoomController;
use App\Livewire\Interview\CreateInterview;
use App\Models\JobPost;
use Illuminate\Support\Facades\Route;
use Laravel\Telescope\Http\Controllers\EventsController;

Route::get('/', function () {
    return view('welcome', ['jobPosts' => JobPost::with('company')->get()]);
})->name('home');

Route::get('/api/company', CompanyController::class)->name('api.company');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::name('ws.')->prefix('launch-job-plus/')->group(function () {
        Route::get('room',[RoomController::class,'index'])->name('room.index');
        Route::get('room/create',[RoomController::class,'create'])->name('room.create');
        Route::get('room/{id}',[RoomController::class,'show'])->name('room.show');
    });

    Route::get('/job-post/{jobPost}', [JobPostController::class, 'show'])->name('job-post.show');

    Route::middleware(['role:company'])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::name('management.')->prefix('management/')->group(function () {
            Route::resource('job-post', JobPostManagementController::class);

            Route::get('job-post/{jobPost}/applicant/download',[ApplicantXMLController::class,'download'])
            ->name('applicant.download');
            Route::get('job-post/{jobPost}/applicant/view-xml',[ApplicantXMLController::class,'viewXML'])
                ->name('applicant.view-xml');
            Route::get('job-post/{jobPost}/applicant/download-xslt',[ApplicantXMLController::class,'downloadTransformedXML'])
                ->name('applicant.download-transformed-xml');

            Route::get('job-post.download',[JobPostManagementController::class, 'download'])->name('job-post.download');
            Route::get('job-post.view-xml',[JobPostManagementController::class, 'viewXML'])->name('job-post.view-xml');
            Route::get('job-post.download-transformedXML',[JobPostManagementController::class, 'downloadTransformedXML'])->name('job-post.download-transformedXML');

            Route::get('job-post/{jobPost}/applicant/{user}', [JobPostManagementController::class, 'showApplicant'])
                ->name('job-application.show');

            Route::get('job-post-archived', [JobPostManagementController::class, 'archived'])
                ->name('job-post.archived');

            Route::get('job-application/{jobApplication}/interview/create', CreateInterviewController::class)
                ->name('job-application.interview.create');
            Route::get('job-application/{jobApplication}/offer-letter/create',SendOfferLetterController::class)
                ->name('job-application.offer-letter.create');

            Route::resource('interview', InterviewManagementController::class);

        });
    });

    Route::middleware(['role:employee'])->group(function () {
        Route::resource('/job-application', JobApplicationController::class);
        Route::resource('/interview', InterviewController::class);
        Route::get('/events', [EventController::class, 'index'])->name('events.index');
        Route::get('/skilltests', [SkillTestController::class, 'index'])->name('skilltests.index');
    });
});


require __DIR__ . '/auth.php';
