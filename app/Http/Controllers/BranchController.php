<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Log;
use RealRashid\SweetAlert\Facades\Alert;
use Str;

class BranchController extends Controller
{
    public function index(Request $request)
    {

        $page = $request->page;

        if(isset($page) && is_numeric($page) && $page>0) {

            $records_to_show = 25;
            $records_to_skip = ($page - 1) * $records_to_show;

            $query = Branch::query();

            $all_records_count = $query->count();

            $num_of_pages = (int) ceil($all_records_count / $records_to_show);

            $branches = $query->skip($records_to_skip)
            ->take($records_to_show)
            ->get();

            return view('admin.branches.index', compact('branches','num_of_pages', 'page'));


        } else {
            return redirect()->route('branches.index', ['page'=>1]);
        }

    }

    public function create() {

        if(session()->has('success')) {
            Alert::success('success', session()->get('success'));
        }

        if(session()->has('error')) {
            Alert::error('error', session()->get('error'));
        }

        return view('admin.branches.form');
    }

    public function store(Request $request) {
        $insert = 0;
        $error = '';

        try {

            $this->requestValidations();

            $inputs = $request->all();

            // Store
            $insert = Branch::create($inputs);

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

        $branch = Branch::findOrFail($id);

        return view('admin.branches.form', compact('branch'));
    }

    public function update(Request $request, Branch $branch, $id)
    {

        $status = 0;
        $error = '';

        try {

            $this->requestValidations($id);
            $branch = Branch::findOrFail($id);

            $inputs = $request->all();

            $branch->fill($inputs);

            if($branch->save()) {
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

        $delete = Branch::where('id', $request->record_id)->delete();

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

        $slugUniqueRule = Rule::unique('branches', 'slug')->ignore($record_id);

        return request()->validate([
            'name' => ['required', 'string', 'max:64'],
            'name_en' => ['required', 'string', 'max:64'],
            'phone_1' => ['required', 'string', 'max:32'],
            'phone_2' => ['nullable', 'string', 'max:32'],
            'email' => ['required', 'email', 'max:64'],
            'address' => ['required'],
            'address_en' => ['required'],
            'latitude' => ['required', 'string', 'max:64'],
            'longitude' => ['required', 'string', 'max:64'],
        ]);
    }

}
