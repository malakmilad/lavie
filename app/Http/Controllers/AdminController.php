<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ContactRequest;
use App\Models\Consultation;
use App\Models\Service;
use App\Models\Faq;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        if(view()->exists($id)){
            return view($id);
        }
        else
        {
            return view('404');
        }

    }

    public function dashboard()
    {
        $servicesCount = Service::count();
        $articlesCount = Article::count();
        $faqCount = Faq::count();
        $contactsCount = ContactRequest::count();
        $consultationsCount = Consultation::count();
        return view('index', compact('servicesCount', 'articlesCount', 'faqCount', 'contactsCount', 'consultationsCount'));
    }

}
