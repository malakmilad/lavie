<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Log;
use Str;
use Illuminate\Support\Facades\File;


class ReviewController extends Controller
{

    public function index(Request $request) {

        $page = $request->page;

        if(isset($page) && is_numeric($page) && $page>0) {

            $records_to_show = 25;
            $records_to_skip = ($page - 1) * $records_to_show;

            $query = Review::query();

            $all_records_count = $query->count();

            $num_of_pages = (int) ceil($all_records_count / $records_to_show);
            
            $reviews = $query->skip($records_to_skip)->take($records_to_show)->get();

            return view('reviews.index', compact('reviews','num_of_pages', 'page'));

            
        } else {
            return redirect()->route('reviews.index', ['page'=>1]);
        }
    }

    public function create() {

        if(session()->has('success')) {
            Alert::success('success', session()->get('success'));
        }

        if(session()->has('error')) {
            Alert::error('error', session()->get('error'));
        }

        return view('reviews.form');
    }



    public function store(Request $request) {
        $insert = 0;
        $error = '';

        try {

            $this->requestValidations();

            $inputs = $request->all();

            // Upload media
            if($request->media_type == 'image') {
                $media_rules = 'required|mimes:jpeg,jpg,png,webp|max:1024';
                $media_src = $this->uploadFile($request, $request->media_type, 'reviews', $media_rules);
                $inputs['media_src'] = $media_src;
            } else {
                $inputs['media_src'] = $request->link;
            }

            // Store
            $insert = Review::create($inputs);

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

        $review = Review::findOrFail($id);

        return view('reviews.form', compact('review'));
    }


    public function update(Request $request, Review $review, $id)
    {

        $status = 0;
        $error = '';

        try {

            $this->requestValidations($id);
            $review = Review::findOrFail($id);

            $inputs = $request->all();

            if($request->image != null || $request->link != null || $request->media_type != $review->media_type) {
                // Upload media
                if($request->media_type == 'image') {
                    $media_rules = 'required|mimes:jpeg,jpg,png,webp|max:1024';
                    $media_src = $this->uploadFile($request, $request->media_type, 'reviews', $media_rules);
                    $inputs['media_src'] = $media_src;
                } else {
                    $inputs['media_src'] = $request->link;
                }
            }

            $review->fill($inputs);

            if($review->save()) {
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

        try {

            $delete = Review::where('id', $request->record_id)->delete();

            if($delete) {

                $status = 1;
                $message = "Record Deleted Successfully !";
            }

        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }

        
        return response()->json([
            'status'=>$status,
            'message'=>$message
        ]);
    }


    public function requestValidations($record_id = null) {

        return request()->validate([
            'media_type' => ['required'],
        ]);
    }

    public function uploadFile(Request $request, $file_name, $folder_name, $rules) {

        // Get the uploaded file
        $file = $request->file($file_name);
    
        // Validation rules for general files
        $fileRules = [
            $file_name => $rules,
        ];
    
        // Validate the file input
        $this->validate($request, $fileRules);
    
        // Generate a unique name for the file
        $fileName = uniqid().'_'.Str::random(6).'.'.$file->getClientOriginalExtension();
    
        // Specify the directory where you want to save the file
        $directory = 'uploads/'.$folder_name;
    
        // Create the directory if it doesn't exist
        File::makeDirectory($directory, $mode = 0777, true, true);
    
        // Move the uploaded file to the specified directory
        $file->move($directory, $fileName);
    
        // Return the path of the uploaded file
        return $folder_name.'/'.$fileName;
    }



}
