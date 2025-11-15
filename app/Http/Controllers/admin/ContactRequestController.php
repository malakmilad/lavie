<?php

namespace App\Http\Controllers;

use App\Models\ContactRequest;
use Illuminate\Http\Request;

class ContactRequestController extends Controller
{
    public function index(Request $request) {

        $page = $request->page;

        if(isset($page) && is_numeric($page) && $page>0) {

            $records_to_show = 25;
            $records_to_skip = ($page - 1) * $records_to_show;

            $query = ContactRequest::query();

            $all_records_count = $query->count();

            $num_of_pages = (int) ceil($all_records_count / $records_to_show);
            
            $contactRequests = $query->skip($records_to_skip)->take($records_to_show)->get();

            return view('contactRequests.index', compact('contactRequests','num_of_pages', 'page'));

            
        } else {
            return redirect()->route('contactRequests.index', ['page'=>1]);
        }
    }

    public function show($id) {

        $contactRequest = ContactRequest::findOrFail($id);

        $contactRequest->status ? '': $contactRequest->fill(['status'=>1])->save();

        return view('contactRequests.form', compact('contactRequest'));
    }

}
