<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
        $this->middleware('isDeleted');
    }
    
    public function index()
    {

        $users = User::where('deleted', 0)->get();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(session()->has('success')) {
            Alert::success('Success', session()->get('success'));
        }
        if(session()->has('error')) {
            Alert::error('error', session()->get('error'));
        }

        return view('users.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:6'],
            'role' => ['required', 'string', 'in:usher,admin'],
        ]);

        $inputs = $request->all();

        $password = Hash::make($request->password);

        $inputs['password'] = $password;

        // Store user
        try {
            $user = User::create($inputs);

            if($user->wasRecentlyCreated) {
                Session()->flash('success' , 'Record Created Successfully !');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            //throw $th;
        }

        Session()->flash('error' , 'an error occured.');
        return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(session()->has('success')) {
            Alert::success('Success', session()->get('success'));
        }
        if(session()->has('error')) {
            Alert::error('error', session()->get('error'));
        }

        $user = User::findOrFail($id);

        return view('users.form', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id) {

        $user = User::findOrFail($request->id);

        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email,'.$user->id],
            'role' => ['required', 'string', 'in:usher,admin'],
        ]);

        $inputs = $request->all();

        if($request->password != null) {

            $request->validate([
                'password' => ['required', 'min:6'],
            ]);
            $password = Hash::make($request->password);

        } else {
            $password = $user->password;
        }

        $inputs['password'] = $password;

        try {
            $user->fill($inputs)->save();

            if($user->exists) {
                Session()->flash('success' , 'Record Updated Successfully !');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            //throw $th;
        }

        Session()->flash('error' , 'an error occured.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $status = 0;
        $message = 'Something went wrong !';

        $user = User::where('id', $request->deleted_id)->first();

        if($user) {

            try {
                $user->fill(array(
                    'deleted' => '1',
                    'password' => $this->generateRandomPassword()
                ))->save();
    
                if($user->exists) {
                    $status = 1;
                $message = "Record Deleted Successfully !";
                }
            } catch (\Throwable $th) {
                //throw $th;
            }
        }

        return response()->json([
            'status'=>$status,
            'message'=>$message
        ]);

    }

    public function generateRandomPassword() {

        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()';
        $password = '';
        for ($i = 0; $i < 12; $i++) {
            $password .= $chars[random_int(0, strlen($chars) - 1)];
        }

        return Hash::make($password);

    }
}
