<?php

use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\ContactSubmissionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\JobApplicationController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

Route::get('sitemap.xml', SitemapController::class)->name('sitemap');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('portfolio', [PortfolioController::class, 'index'])->name('portfolio');
Route::view('about', 'user.about')->name('about');
Route::get('careers', [CareerController::class, 'index'])->name('careers.index');
Route::get('careers/{job}', [CareerController::class, 'show'])->name('careers.show');
Route::post('careers/{job}/apply', [CareerController::class, 'apply'])->name('careers.apply');
Route::post('contact-us', [ContactUsController::class, 'store'])->name('contact-us');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminAuthController::class, 'login'])->name('login.store');

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');
        Route::resource('contacts', ContactSubmissionController::class)->only(['index', 'show', 'destroy']);
        Route::get('jobs/older', [JobController::class, 'archived'])->name('jobs.archived');
        Route::resource('jobs', JobController::class);
        Route::get('applications/{application}/resume', [JobApplicationController::class, 'downloadResume'])->name('applications.resume');
        Route::resource('applications', JobApplicationController::class)->only(['index', 'show', 'update', 'destroy']);
    });
});

Route::controller(ServiceController::class)->group(function () {
    Route::get('services/web', 'webDevelopment')->name('web-development');
    Route::get('services/ux-ui-design', 'uxUiDesign')->name('ux-ui-design');
    Route::get('services/digital-marketing', 'digitalMarketing')->name('digital-marketing');
    Route::get('services/seo', 'seo')->name('seo');
    Route::get('services/video-editing', 'videoEditing')->name('video-editing');
    Route::get('services/mobile-app-development', 'mobileAppDevelopment')->name('mobile-app-development');
    Route::get('services/graphic-designing', 'graphicDesigning')->name('graphic-designing');
});
