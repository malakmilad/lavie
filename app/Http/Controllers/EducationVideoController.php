<?php

namespace App\Http\Controllers;

use App\Models\EducationVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Log;
use RealRashid\SweetAlert\Facades\Alert;
use Str;

class EducationVideoController extends Controller
{
    public function index(Request $request)
    {

        $page = $request->page;

        if(isset($page) && is_numeric($page) && $page>0) {

            $records_to_show = 25;
            $records_to_skip = ($page - 1) * $records_to_show;

            $query = EducationVideo::query();

            $all_records_count = $query->count();

            $num_of_pages = (int) ceil($all_records_count / $records_to_show);
            
            $videos = $query->skip($records_to_skip)
            ->take($records_to_show)
            ->get();

            return view('videos.index', compact('videos','num_of_pages', 'page'));

            
        } else {
            return redirect()->route('videos.index', ['page'=>1]);
        }

    }

    public function create() {

        if(session()->has('success')) {
            Alert::success('success', session()->get('success'));
        }

        if(session()->has('error')) {
            Alert::error('error', session()->get('error'));
        }

        return view('videos.form');
    }

    public function store(Request $request) {
        $insert = 0;
        $error = '';

        try {

            $this->requestValidations();

            $inputs = $request->all();

            // Store
            $insert = EducationVideo::create($inputs);

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

        $video = EducationVideo::findOrFail($id);

        return view('videos.form', compact('video'));
    }

    public function update(Request $request, EducationVideo $video, $id)
    {

        $status = 0;
        $error = '';

        try {

            $this->requestValidations();
            $video = EducationVideo::findOrFail($id);

            $inputs = $request->all();
           
            $video->fill($inputs);

            if($video->save()) {
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

        $delete = EducationVideo::where('id', $request->record_id)->delete();

        if($delete) {
            $status = 1;
            $message = "Record Deleted Successfully !";
        }

        return response()->json([
            'status'=>$status,
            'message'=>$message
        ]);
    }

    public function requestValidations() {

        return request()->validate([
            'media_src' => ['required', 'string'],
        ]);
    }  

}
