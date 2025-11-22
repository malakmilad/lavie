<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ConsultationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactRequestController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\EducationVideoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;

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

Auth::routes(['register' => false]);

Route::group(['prefix'=>'admins', 'middleware'=>['auth']], function() {

    Route::get('/', [AdminController::class, 'dashboard'])->name('home');

    // services routes
    Route::resource('/services', ServiceController::class);
    Route::post('services/{id}', [ServiceController::class, 'update']);
    Route::post('/delete/service', [ServiceController::class, 'destroy']);
    Route::post('/insertServiceFaq', [ServiceController::class, 'insertServiceFaq'])->name('insertServiceFaq');
    Route::post('/updateServiceFaq', [ServiceController::class, 'updateServiceFaq'])->name('updateServiceFaq');
    Route::get('/servicefaq/{id}', [ServiceController::class, 'showServiceFaq']);
    Route::post('/deleteServiceFaq', [ServiceController::class, 'deleteServiceFaq'])->name('deleteServiceFaq');
    Route::post('/insertServiceReview', [ServiceController::class, 'insertServiceReview'])->name('insertServiceReview');
    Route::post('/deleteServiceReview', [ServiceController::class, 'deleteServiceReview'])->name('deleteServiceReview');
    Route::post('/insertServiceVideo', [ServiceController::class, 'insertServiceVideo'])->name('insertServiceVideo');
    Route::post('/deleteServiceVideo', [ServiceController::class, 'deleteServiceVideo'])->name('deleteServiceVideo');


    // articles routes
    Route::resource('/articles', ArticleController::class);
    Route::post('articles/{id}', [ArticleController::class, 'update']);
    Route::post('/delete/article', [ArticleController::class, 'destroy']);

    // abouts routes
    Route::resource('/abouts', AboutController::class);
    Route::post('abouts/{id}', [AboutController::class, 'update']);
    Route::post('/delete/about', [AboutController::class, 'destroy']);

    // sliders routes
    Route::resource('/sliders', SliderController::class);
    Route::post('sliders/{id}', [SliderController::class, 'update']);
    Route::post('/delete/slider', [SliderController::class, 'destroy']);

    // faqs routes
    Route::resource('/faqs', FaqController::class);
    Route::post('faqs/{id}', [FaqController::class, 'update']);
    Route::post('/delete/faq', [FaqController::class, 'destroy']);

    //review routes
    Route::resource('/reviews', ReviewController::class);
    Route::post('reviews/{id}', [ReviewController::class, 'update']);
    Route::post('/delete/review', [ReviewController::class, 'destroy']);

    //branch routes
    Route::resource('/branches', BranchController::class);
    Route::post('branches/{id}', [BranchController::class, 'update']);
    Route::post('/delete/branch', [BranchController::class, 'destroy']);

    //videos routes
    Route::resource('/videos', EducationVideoController::class);
    Route::post('videos/{id}', [EducationVideoController::class, 'update']);
    Route::post('/delete/video', [EducationVideoController::class, 'destroy']);

    //contactRequest routes
    Route::resource('/contactRequests', ContactRequestController::class);

    //consultations routes
    Route::resource('/consultations', ConsultationController::class);

    // profile routes
    Route::get('profile', [ProfileController::class, 'show']);
    Route::post('profile/{id}', [ProfileController::class, 'update'])->name('profile.update');



});

