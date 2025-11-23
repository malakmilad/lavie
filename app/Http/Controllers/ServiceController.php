<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceFaq;
use App\Models\ServiceReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Log;
use RealRashid\SweetAlert\Facades\Alert;
use Str;

class ServiceController extends Controller
{
    public function index(Request $request)
    {

        $page = $request->page;

        if(isset($page) && is_numeric($page) && $page>0) {

            $records_to_show = 25;
            $records_to_skip = ($page - 1) * $records_to_show;

            $query = Service::query();

            $all_records_count = $query->count();

            $num_of_pages = (int) ceil($all_records_count / $records_to_show);

            $services = $query->skip($records_to_skip)
            ->take($records_to_show)
            ->get();

            return view('admin.services.index', compact('services','num_of_pages', 'page'));


        } else {
            return redirect()->route('services.index', ['page'=>1]);
        }

    }

    public function create() {

        if(session()->has('success')) {
            Alert::success('success', session()->get('success'));
        }

        if(session()->has('error')) {
            Alert::error('error', session()->get('error'));
        }

        return view('admin.services.form');
    }

    public function store(Request $request) {
        $insert = 0;
        $error = '';

        try {

            $this->requestValidations();

            $inputs = $request->all();

            // Upload Main Image
            $imgName = $this->uploadFile($request, 'main_image', 'services_imgs', 'required|mimes:jpeg,jpg,png,webp|max:1024');
            $inputs['main_image'] = $imgName;

            if($request->video) {
                // Upload video
                $videoName = $this->uploadFile($request, 'video', 'services_videos', 'required|mimes:mp4,avi,mov,flv,mkv,webm|max:10000');
                $inputs['video'] = $videoName;
            }

            // Store
            $insert = Service::create($inputs);

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

        $service = Service::findOrFail($id);

        $service_faqs = ServiceFaq::where('service_id', $id)->get();
        $service_reviews = ServiceReview::where('service_id', $id)->get();

        return view('admin.services.form', compact('service', 'service_faqs', 'service_reviews'));
    }

    public function update(Request $request, Service $service, $id)
    {

        $status = 0;
        $error = '';

        try {

            $this->requestValidations($id);
            $service = Service::findOrFail($id);

            $inputs = $request->all();
            $request->featured ? '' : $inputs['featured'] = '0';

            if($request->main_image != null) {
                // Upload Image
                $imgName = $this->uploadFile($request, 'main_image', 'services_imgs', 'required|mimes:jpeg,jpg,png,webp|max:1024');
                $inputs['main_image'] = $imgName;
            }

            if($request->imgs) {
                // Upload images
                $imgs = $this->uploadImages($request, 'imgs', 'services_imgs');


                $inputs['imgs'] = implode(', ', $imgs);
            }

            if($request->video) {
                // Upload video
                $videoName = $this->uploadFile($request, 'video', 'services_videos', 'required|mimes:mp4,avi,mov,flv,mkv,webm|max:10000');
                $inputs['video'] = $videoName;
            }

            $service->fill($inputs);

            if($service->save()) {
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

        $delete = Service::where('id', $request->record_id)->delete();

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

        $slugUniqueRule = Rule::unique('services', 'slug')->ignore($record_id);

        return request()->validate([
            'title' => ['required', 'string', 'max:96'],
            'title_en' => ['required', 'string', 'max:96'],
            'overview' => ['required'],
            'overview_en' => ['required'],
            'description' => ['required'],
            'description_en' => ['required'],
        ]);
    }

    public function uploadImages(Request $request, $fileName, $folder_name) {

        $imgArr = [];

        $images = $request->file($fileName);

        $imgRules = [
            $fileName => 'required|array',
            $fileName.'.*' => 'required|mimes:jpeg,jpg,png,webp|max:1024',
        ];

        $customImageMessages = [
            'required' => 'Image field is required',
            'mimes' => 'Image type not allowed',
            'max' => 'Image size shouldn\'t be grater than 1024KB',
        ];
        $this->validate($request, $imgRules, $customImageMessages);


        foreach($images as $imagefile) {
            $imgName = uniqid().'_'.Str::random(6).'.'.$imagefile->extension();

            // Specify the directory where you want to save the image
            $directory = 'uploads/'.$folder_name;

            // Create the directory if it doesn't exist
            File::makeDirectory($directory, $mode = 0777, true, true);

            // Move the uploaded image to the specified directory
            $imagefile->move($directory, $imgName);

            $imgArr[] = $folder_name.'/'.$imgName;
        }

        return $imgArr;
    }

    public function insertServiceVideo(Request $request) {
        $is_done = '';
        try {
            $service = Service::find($request->service_id);

            if($service->youtube_urls) {
                $newVideoSrcs = $service->youtube_urls . ", " . $request->youtube_url;
            } else {
                $newVideoSrcs = $request->youtube_url;
            }


            $is_done = $service->fill(['youtube_urls' => $newVideoSrcs])->save();

        } catch (\Exception $e) {}

        if($is_done) {
            Session()->flash('success' , 'Record created Successfully !');
        } else {
            Session()->flash('error' , $e->getMessage());
        }

        return redirect()->back();

    }

    public function deleteServiceVideo(Request $request)
    {
        $status = 0;
        $message = 'Something went wrong !';

        try {
            $service = Service::where($request->record_id)->first();

            $videoArr = explode(", ", $service->youtube_urls);
            $result = array_diff($videoArr, [$request->src]);
            $newVideoSrcs = implode(', ', $result) ;

            $service->fill(['youtube_urls' => $newVideoSrcs]);


            if( $service->save()) {
                $status = 1;
                $message = "Record Deleted Successfully !";
            }

        } catch (\Exception $e) {
            $message = $e->getMessage();
        }


        return response()->json([
            'status'=>$status,
            'message'=>$message
        ]);
    }

    public function insertServiceFaq(Request $request) {
        $insert = '';
        try {
            $inputs = $request->all();
            if($request->video) {
                // Upload video
                $videoName = $this->uploadFile($request, 'video', 'services_faqs', 'required|mimes:mp4,avi,mov,flv,mkv,webm|max:10000');
                $inputs['video'] = $videoName;
            }

            $insert = ServiceFaq::create($inputs);
        } catch (\Throwable $th) {}

        if($insert) {
            Session()->flash('success' , 'Record created Successfully !');
        } else {
            Session()->flash('error' , 'Something went wrong.');
        }

        return redirect()->back();

    }

    public function showServiceFaq($id) {
        if(session()->has('success')) {
            Alert::success('success', session()->get('success'));
        }

        if(session()->has('error')) {
            Alert::error('error', session()->get('error'));
        }

        $service_faq = ServiceFaq::findOrFail($id);

        return view('services.service_faq', compact('service_faq'));

    }

    public function updateServiceFaq(Request $request) {
        $update = '';
        try {
            $inputs = $request->all();
            if($request->video) {
                // Upload video
                $videoName = $this->uploadFile($request, 'video', 'services_faqs', 'required|mimes:mp4,avi,mov,flv,mkv,webm|max:10000');
                $inputs['video'] = $videoName;
            }

            $update = ServiceFaq::find($request->id)->fill($inputs)->save();
        } catch (\Exception $e) {}

        if($update) {
            Session()->flash('success' , 'Record Updated Successfully !');
        } else {
            Session()->flash('error' , 'Something went wrong.');
        }

        return redirect()->back();

    }

    public function deleteServiceFaq(Request $request)
    {
        $status = 0;
        $message = 'Something went wrong !';

        $delete = ServiceFaq::where('id', $request->record_id)->delete();

        if($delete) {
            $status = 1;
            $message = "Record Deleted Successfully !";
        }

        return response()->json([
            'status'=>$status,
            'message'=>$message
        ]);
    }

    public function insertServiceReview(Request $request) {
        $insert = '';
        try {
            $inputs = $request->all();
            // Upload Image
            $imgName = $this->uploadFile($request, 'img', 'services_reviews', 'required|mimes:jpeg,jpg,png,webp|max:1024');
            $inputs['img'] = $imgName;

            $insert = ServiceReview::create($inputs);
        } catch (\Throwable $th) {}

        if($insert) {
            Session()->flash('success' , 'Record created Successfully !');
        } else {
            Session()->flash('error' , 'Something went wrong.');
        }

        return redirect()->back();

    }

    public function deleteServiceReview(Request $request)
    {
        $status = 0;
        $message = 'Something went wrong !';

        $delete = ServiceReview::where('id', $request->record_id)->delete();

        if($delete) {
            $status = 1;
            $message = "Record Deleted Successfully !";
        }

        return response()->json([
            'status'=>$status,
            'message'=>$message
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
