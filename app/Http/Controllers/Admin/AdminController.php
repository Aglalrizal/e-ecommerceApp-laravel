<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin/dashboard');
    }

    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $rules = [
                'email' => 'required|email|max: 255',
                'password' => 'required|max: 255'
            ];

            $customMessages = [
                'email.required' => 'Email is required!',
                'email.email' => 'Email is invalid!',
                'password.required' => 'Password is required!', 
            ];

            $this->validate($request, $rules, $customMessages);

            if(Auth::guard('admins')->attempt(['email'=>$data['email'], 'password'=>$data['password']])){
                return redirect('admin/dashboard');
            }else{
                return redirect()->back()->with('error_message','invalid email or password!');
            };
        }
        return view('admin/login');
    }
    public function logout(){
        Auth::guard('admins')->logout();
        return redirect('admin/login');
    }
}
