<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Log;
use RealRashid\SweetAlert\Facades\Alert;
use Str;

class ProfileController extends Controller
{

    public function show() {
        
        if(session()->has('success')) {
            Alert::success('success', session()->get('success'));
        }

        if(session()->has('error')) {
            Alert::error('error', session()->get('error'));
        }

        $profile = Profile::findOrFail(1);

        return view('profile.form', compact('profile'));
    }

    public function update(Request $request, Profile $profile, $id)
    {

        $status = 0;
        $error = '';

        try {

            $this->requestValidations();
            $profile = Profile::findOrFail($id);

            $inputs = $request->all();

            if($request->profile_image != null) {
                // Upload Image
                $imgName = $this->uploadFile($request, 'profile_image', 'profile_imgs', 'required|mimes:jpeg,jpg,png,webp|max:1024');
                $inputs['profile_image'] = $imgName;
            }

            if($request->cover_image != null) {
                // Upload Image
                $bannerImgName = $this->uploadFile($request, 'cover_image', 'profile_imgs', 'required|mimes:jpeg,jpg,png,webp|max:1024');
                $inputs['cover_image'] = $bannerImgName;
            }

            $profile->fill($inputs);

            if($profile->save()) {
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

    public function requestValidations() {

        return request()->validate([
            'name' => ['required', 'string', 'max:32'],
            'name_en' => ['required', 'string', 'max:32'],
            'title' => ['required', 'string'],
            'title_en' => ['required', 'string'],
            'phone' => ['required', 'string', 'max:32'],
            'email' => ['required', 'email', 'max:64'],
            'cv' => ['required'],
            'cv_en' => ['required'],
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
