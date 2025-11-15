<?php

namespace App\Providers;

use App\Models\Service;
use Illuminate\Support\ServiceProvider;
use App\Models\Branch;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        $this->app->singleton('locale', function () {
            $locale = request()->cookie('locale', config('app.locale'));
            return $locale;
        });

        view()->composer('*', function ($view) {
            $locale = app('locale');
            $title = $locale == "ar" ? "title" : "title_en";
            $name = $locale == "ar" ? "name" : "name_en";
            $overview = $locale == "ar" ? "overview" : "overview_en";
            $description = $locale == "ar" ? "description" : "description_en";
            $question = $locale == "ar" ? "question" : "question_en";
            $answer = $locale == "ar" ? "answer" : "answer_en";
            $address = $locale == "ar" ? "address" : "address_en";
            $cv = $locale == "ar" ? "cv" : "cv_en";
            $btn_text = $locale == "ar" ? "btn_text" : "btn_text_en";

            $view->with('locale', $locale);
            $view->with('title', $title);
            $view->with('name', $name);
            $view->with('overview', $overview);
            $view->with('description', $description);
            $view->with('question', $question);
            $view->with('answer', $answer);
            $view->with('address', $address);
            $view->with('cv', $cv);
            $view->with('btn_text', $btn_text);
        });


        $branches = Branch::all();
        $latest_services = Service::select('id', 'title', 'title_en' ,'slug')->orderBy("id", "desc")->limit(5)->get();

        view()->share('branches', $branches);
        view()->share('latest_services', $latest_services);
    }
}
