<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Log;
use Str;

class FaqController extends Controller
{

    public function index(Request $request) {

        $page = $request->page;

        if(isset($page) && is_numeric($page) && $page>0) {

            $records_to_show = 25;
            $records_to_skip = ($page - 1) * $records_to_show;

            $query = Faq::query();

            $all_records_count = $query->count();

            $num_of_pages = (int) ceil($all_records_count / $records_to_show);
            
            $faqs = $query->skip($records_to_skip)->take($records_to_show)->get();

            return view('faqs.index', compact('faqs','num_of_pages', 'page'));

            
        } else {
            return redirect()->route('faqs.index', ['page'=>1]);
        }
    }

    public function create() {

        if(session()->has('success')) {
            Alert::success('success', session()->get('success'));
        }

        if(session()->has('error')) {
            Alert::error('error', session()->get('error'));
        }

        return view('faqs.form');
    }



    public function store(Request $request) {
        $insert = 0;
        $error = '';

        try {

            $this->requestValidations();

            $inputs = $request->all();
            $request->featured ? '' : $inputs['featured'] = '0';

            // Store
            $insert = Faq::create($inputs);

        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();

        } catch (\Exception $e) {
            $error = $e->getMessage();
        }

        if($insert) {
            Session()->flash('success' , 'Record Created Successfully !');
        } else {
            Log::error($error);
            Session()->flash('error' , 'Something went wrong.');
        }
       
        return redirect()->back();
    }

    public function show($id) {
        
        if(session()->has('success')) {
            Alert::success('success', session()->get('success'));
        }

        if(session()->has('error')) {
            Alert::error('error', session()->get('error'));
        }

        $faq = Faq::findOrFail($id);

        return view('faqs.form', compact('faq'));
    }


    public function update(Request $request, Faq $faq, $id)
    {

        $status = 0;
        $error = '';

        try {

            $this->requestValidations($id);
            $faq = Faq::findOrFail($id);

            $inputs = $request->all();
            $request->featured ? '' : $inputs['featured'] = '0';

            $faq->fill($inputs);

            if($faq->save()) {
                $status = 1;
            }

        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();

        } catch (\Exception $e) {
            $error = $e->getMessage();
        }

        if($status) {
            Session()->flash('success' , 'Record Updated Successfully !');
        } else {
            Log::error($error);
            Session()->flash('error' , 'Something went wrong.');
        }
       
        return redirect()->back();
        
    }

    public function destroy(Request $request)
    {
        $status = 0;
        $message = 'Something went wrong !';

        $delete = Faq::where('id', $request->record_id)->delete();

        if($delete) {

            $status = 1;
            $message = "Record Deleted Successfully !";
        }

        return response()->json([
            'status'=>$status,
            'message'=>$message
        ]);
    }


    public function requestValidations($record_id = null) {

        return request()->validate([
            'question' => ['required', 'string', 'max:96'],
            'question_en' => ['required', 'string', 'max:96'],
            'answer' => ['required'],
            'answer_en' => ['required'],
            'sort_order' => ['required', 'numeric'],
        ]);
    }


}
