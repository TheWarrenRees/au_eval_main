<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{

    public function index() {
        return view('student.login');
    }

    public function login(Request $request) {

        $rules = [
            'username' => 'required|string',
            'password' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $credentials = $request->only('username', 'password');

        if(Auth::guard('students')->attempt($credentials)) {
            $user = Auth::guard('students')->user();
            if($user) {
                Auth::guard('students')->login($user);
                return redirect()->route('student.dashboard');
            } else {
                return redirect()->back()->with('error', 'User not found');
            }
        }

        return redirect()->back()->withInput()->with('error', 'Username or password is invalid');
    }

    public function logout() {
        Auth::guard('students')->logout();
        return redirect()->route('student.login');
    }

}
