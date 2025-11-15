<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Article;
use App\Models\Branch;
use App\Models\Faq;
use App\Models\Review;
use App\Models\Service;
use App\Models\ServiceFaq;
use App\Models\ServiceReview;
use App\Models\Slider;
use App\Models\EducationVideo;
use App\Models\Profile;
use Cookie;

class PageController extends Controller
{

    public function changeLocale($locale)
    {
        if (in_array($locale, ['en', 'ar'])) {
            Cookie::queue('locale', $locale, 525600);
            config(['app.locale' => $locale]);    
        }
    
        return redirect()->back();
    }

    public function index() {
        $services = Service::limit(8)->select('slug', 'title', 'title_en' ,'main_image')->get();
        $articles = Article::limit(8)->select('slug', 'title', 'title_en', 'overview' , 'overview_en','main_image')->get();
        $sliders = Slider::all();
        $faqs = Faq::where('featured', 1)->orderBy('sort_order')->limit(8)->get();

        return view("index", compact('services', 'articles', 'faqs', 'sliders'));
    }

    public function about_page() {
        $abouts = About::all();
        return view("pages.about", compact('abouts'));
    }

    public function services_page() {
        $services = Service::select('slug', 'title', 'title_en' , 'overview' , 'overview_en','main_image')->get();
        return view("pages.services", compact('services'));
    }

    public function services_single_page($slug) {
        $service = Service::where('slug', $slug)->first();
        if($service) {
            $service_faqs = ServiceFaq::where('service_id', $service->id)->get();
            $service_reviews = ServiceReview::where('service_id', $service->id)->get();
            return view("pages.services-single", compact('service', 'service_faqs', 'service_reviews'));
        }
        return redirect()->route("home");
    }

    public function articles_page() {
        $articles = Article::select('slug', 'title', 'title_en', 'overview' , 'overview_en','main_image')->get();
        return view("pages.articles", compact('articles'));
    }

    public function articles_single_page($slug) {
        $article = Article::where('slug', $slug)->first();
        if($article) {
            return view("pages.article-details", compact('article'));
        }
        return redirect()->route("home");
    }

    public function contact_page() {
        return view("pages.contact");
    }

    public function consultation_page() {
        return view("pages.consultation");
    }

    public function branch_page($id) {
        $branch = Branch::findOrFail($id);
        if($branch) {
            return view("pages.branch-single", compact('branch'));
        }
        return redirect()->route("home");
    }

    public function reviews() {
        $reviews = Review::all();
        $reviews_videos = $reviews->where('media_type', 'video');
        $reviews_images = $reviews->where('media_type', 'image');
        return view("pages.reviews", compact('reviews_videos', 'reviews_images'));
    }

    public function faq_page() {
        $faqs = Faq::orderBy('sort_order')->get();
        return view("pages.faq", compact('faqs'));
    }

    public function profile_page() {
        $profile = Profile::findOrFail(1);
        $articles = Article::select('slug', 'title', 'title_en', 'overview' , 'overview_en','main_image')->orderBy('id', 'desc')->limit(3)->get();
        return view("pages.profile", compact('profile', 'articles'));
    }

    public function education_videos_page() {
        $videos = EducationVideo::all();
        return view("pages.education-videos", compact('videos'));
    }
}
