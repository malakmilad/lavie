<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Log;
use RealRashid\SweetAlert\Facades\Alert;
use Str;

class ArticleController extends Controller
{
    public function index(Request $request)
    {

        $page = $request->page;

        if(isset($page) && is_numeric($page) && $page>0) {

            $records_to_show = 25;
            $records_to_skip = ($page - 1) * $records_to_show;

            $query = Article::query();

            $all_records_count = $query->count();

            $num_of_pages = (int) ceil($all_records_count / $records_to_show);

            $articles = $query->skip($records_to_skip)
            ->take($records_to_show)
            ->get();

            return view('admin.articles.index', compact('articles','num_of_pages', 'page'));


        } else {
            return redirect()->route('articles.index', ['page'=>1]);
        }

    }

    public function create() {

        if(session()->has('success')) {
            Alert::success('success', session()->get('success'));
        }

        if(session()->has('error')) {
            Alert::error('error', session()->get('error'));
        }

        return view('admin.articles.form');
    }

    public function store(Request $request) {
        $insert = 0;
        $error = '';

        try {

            $this->requestValidations();

            $inputs = $request->all();

            // Upload Main Image
            $imgName = $this->uploadFile($request, 'main_image', 'articles_imgs', 'required|mimes:jpeg,jpg,png,webp|max:1024');
            $inputs['main_image'] = $imgName;

            // Upload Banner Image
            $bannerImgName = $this->uploadFile($request, 'banner_image', 'articles_imgs', 'required|mimes:jpeg,jpg,png,webp|max:1024');
            $inputs['banner_image'] = $bannerImgName;

            // Store
            $insert = Article::create($inputs);

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

        $article = Article::findOrFail($id);

        return view('admin.articles.form', compact('article'));
    }

    public function update(Request $request, Article $article, $id)
    {

        $status = 0;
        $error = '';

        try {

            $this->requestValidations($id);
            $article = Article::findOrFail($id);

            $inputs = $request->all();

            if($request->main_image != null) {
                // Upload Image
                $imgName = $this->uploadFile($request, 'main_image', 'articles_imgs', 'required|mimes:jpeg,jpg,png,webp|max:1024');
                $inputs['main_image'] = $imgName;
            }

            if($request->banner_image != null) {
                // Upload Image
                $bannerImgName = $this->uploadFile($request, 'banner_image', 'articles_imgs', 'required|mimes:jpeg,jpg,png,webp|max:1024');
                $inputs['banner_image'] = $bannerImgName;
            }

            $article->fill($inputs);

            if($article->save()) {
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

        $delete = Article::where('id', $request->record_id)->delete();

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

        $slugUniqueRule = Rule::unique('articles', 'slug')->ignore($record_id);

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
            $fileName.'.*' => 'required|mimes:jpeg,jpg,png,webp|max:300',
        ];

        $customImageMessages = [
            'required' => 'Image field is required',
            'mimes' => 'Image type not allowed',
            'max' => 'Image size shouldn\'t be grater than 300KB',
        ];
        $this->validate($request, $imgRules, $customImageMessages);


        foreach($images as $imagefile) {
            $imgName = uniqid().'_'.Str::random(6).'.'.$imagefile->extension();

            // Specify the directory where you want to save the image
            $directory = '../../public/uploads/'.$folder_name;

            // Create the directory if it doesn't exist
            File::makeDirectory($directory, $mode = 0777, true, true);

            // Move the uploaded image to the specified directory
            $imagefile->move($directory, $imgName);

            $imgArr[] = $folder_name.'/'.$imgName;
        }

        return $imgArr;
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
