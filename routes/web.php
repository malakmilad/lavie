<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ConsultationController;
use Illuminate\Support\Facades\Route;


Route::get('/lang/{locale}', [PageController::class, 'changeLocale'])->name('lang.change');

Route::group(['middleware' => \App\Http\Middleware\Locale::class] , function() {

    Route::get("/", [PageController::class, 'index'])->name('home');
    Route::get("/about", [PageController::class, 'about_page'])->name('about');

    Route::get("/services", [PageController::class, 'services_page'])->name('services');
    Route::get("/service/{slug}", [PageController::class, 'services_single_page']);

    Route::get("/articles", [PageController::class, 'articles_page'])->name('articles');
    Route::get("/article/{slug}", [PageController::class, 'articles_single_page']);

    Route::get("/contact", [PageController::class, 'contact_page'])->name('contact');
    Route::get("/branch/{id}", [PageController::class, 'branch_page'])->name('branch');
    Route::get("/reviews", [PageController::class, 'reviews'])->name('reviews');
    Route::get("/faq", [PageController::class, 'faq_page'])->name('faq');
    Route::get("/profile", [PageController::class, 'profile_page'])->name('profile');
    Route::get("/education_videos", [PageController::class, 'education_videos_page'])->name('education_videos');
    Route::get("/consultation", [PageController::class, 'consultation_page'])->name('consultation');

    Route::post("/insert_contact_req", [ContactController::class, 'insertContactReq'])->name('insertContactReq');
    Route::post("/insert_consultation", [ConsultationController::class, 'insertConsultation'])->name('insertConsultation');

});
