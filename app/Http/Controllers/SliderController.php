<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Log;
use RealRashid\SweetAlert\Facades\Alert;
use Str;

class SliderController extends Controller
{
    public function index(Request $request)
    {

        $page = $request->page;

        if(isset($page) && is_numeric($page) && $page>0) {

            $records_to_show = 25;
            $records_to_skip = ($page - 1) * $records_to_show;

            $query = Slider::query();

            $all_records_count = $query->count();

            $num_of_pages = (int) ceil($all_records_count / $records_to_show);

            $sliders = $query->skip($records_to_skip)
            ->take($records_to_show)
            ->get();

            return view('admin.sliders.index', compact('sliders','num_of_pages', 'page'));


        } else {
            return redirect()->route('sliders.index', ['page'=>1]);
        }

    }

    public function create() {

        if(session()->has('success')) {
            Alert::success('success', session()->get('success'));
        }

        if(session()->has('error')) {
            Alert::error('error', session()->get('error'));
        }

        return view('admin.sliders.form');
    }

    public function store(Request $request) {
        $insert = 0;
        $error = '';

        try {

            $this->requestValidations();

            $inputs = $request->all();

            // Upload Main Image
            $imgName = $this->uploadFile($request, 'img', 'sliders_imgs', 'required|mimes:jpeg,jpg,png,webp|max:2048');
            $inputs['img'] = $imgName;

            // Store
            $insert = Slider::create($inputs);

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

        $slider = Slider::findOrFail($id);

        return view('admin.sliders.form', compact('slider'));
    }

    public function update(Request $request, Slider $slider, $id)
    {

        $status = 0;
        $error = '';

        try {

            $this->requestValidations($id);
            $slider = Slider::findOrFail($id);

            $inputs = $request->all();

            if($request->img != null) {
                // Upload Image
                $imgName = $this->uploadFile($request, 'img', 'sliders_imgs', 'required|mimes:jpeg,jpg,png,webp|max:300');
                $inputs['img'] = $imgName;
            }

            $slider->fill($inputs);

            if($slider->save()) {
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

        // Check if there is more than one slider
        $sliderCount = Slider::count();
        if ($sliderCount <= 1) {
            $message = 'At least one slider must remain. Deletion not allowed.';
        } else {
            // Perform deletion if there is more than one slider
            $delete = Slider::where('id', $request->record_id)->delete();

            if ($delete) {
                $status = 1;
                $message = "Record Deleted Successfully !";
            }
        }

        return response()->json([
            'status' => $status,
            'message' => $message
        ]);
    }


    public function requestValidations($record_id = null) {

        $slugUniqueRule = Rule::unique('sliders', 'slug')->ignore($record_id);

        return request()->validate([
            'title' => ['required'],
            'title_en' => ['required'],
            'description' => ['required'],
            'description_en' => ['required'],
            'btn_text' => ['required'],
            'btn_text_en' => ['required'],
            'btn_url' => ['required'],
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
