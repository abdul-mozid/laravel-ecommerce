<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AdminUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller {

    public function login(Request $req) {
        $user = User::where(['email' => $req->email])->first();
        if ($user && Hash::check($req->password, $user->password)) {
            $req->session()->flash('f_data', 'User Logged in Successfully');
            $req->session()->flash('f_class', 'alert-primary');
            $req->session()->put('user', $user);
            if (session()->has('adminUser')) {
                session()->forget('adminUser');
            }
            return redirect('/');
        } else {
            $req->session()->flash('f_data', 'User not logged in');
            $req->session()->flash('f_class', 'alert-danger');
            return redirect('/login');
        }
    }

    public function adminLogin(Request $req) {
        $user = AdminUser::where(['email' => $req->email])->first();
        if ($user && Hash::check($req->password, $user->password)) {
            $req->session()->flash('f_data', 'User Logged in Successfully');
            $req->session()->flash('f_class', 'alert-primary');
            $req->session()->put('adminUser', $user);
            if (session()->has('user')) {
                session()->forget('user');
            }
            return redirect('/');
        } else {
            $req->session()->flash('f_data', 'User not logged in');
            $req->session()->flash('f_class', 'alert-danger');
            return redirect('/login');
        }
    }

    public function register() {
        return view('register');
    }

    public function userRegistration(Request $req) {
        $validator = Validator::make($req->all(), [
                    'name' => 'required',
                    'email' => 'required',
                    'password' => 'required',
        ]);
        if ($validator->fails()) {
            return back()
                    ->withErrors($validator)
                    ->withInput();
        }
        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->is_active = 1;
        $save = $user->save();
        return back()->with('status', 'Profile updated!');
    }

}
