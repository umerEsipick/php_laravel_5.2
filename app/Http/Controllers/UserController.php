<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Hash;
use Auth;
use Session;
use Validator;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function edit($id)
    {
        $users = User::find($id);
        return view('auth.change_password')->with('users', $users);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:6|confirmed'
        ]);

        if ($validator->fails()) {
            return redirect('user/' . Auth::user()->id . '/edit')->withInput()->withErrors($validator);
        }

        $user = User::find($id);

        $user->fill(['password'=>Hash::make($request->password)])->save();

        Session::flash('user_update', 'Your password has been updated');

        return redirect('user');
    }
}
