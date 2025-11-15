<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function index(Request $request) {

        $page = $request->page;

        if(isset($page) && is_numeric($page) && $page>0) {

            $records_to_show = 25;
            $records_to_skip = ($page - 1) * $records_to_show;

            $query = Consultation::query();

            $all_records_count = $query->count();

            $num_of_pages = (int) ceil($all_records_count / $records_to_show);
            
            $consultations = $query->skip($records_to_skip)->take($records_to_show)->get();

            return view('consultations.index', compact('consultations','num_of_pages', 'page'));

            
        } else {
            return redirect()->route('consultations.index', ['page'=>1]);
        }
    }

    public function show($id) {

        $consultation = Consultation::findOrFail($id);

        $consultation->status ? '': $consultation->fill(['status'=>1])->save();

        return view('consultations.form', compact('consultation'));
    }

}
