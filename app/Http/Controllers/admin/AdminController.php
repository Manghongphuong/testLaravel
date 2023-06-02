<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        return view('admin.layout.index');
    }
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function loginPage(){
        return view('admin.login');
    }
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ],
        [
            'email.required' => 'Trường này không được để trống.',
            'email.email' => 'Địa chỉ email không hợp lệ.',
            'password.required' => 'Trường này không được để trống.',
        ]
        );
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        else {
            return back()->withErrors([
                'email' => 'Không tồn tại email',
            ])->onlyInput('email');
        }
    }
}
