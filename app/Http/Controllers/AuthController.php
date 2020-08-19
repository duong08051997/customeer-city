<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Services\UserService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService=$userService;
    }
    public function showFormRegister()
    {
        return view('register');
    }
    public function Register(RegisterRequest $request)
    {
        if (User::where('email', '=',$request->input('email'))->exists()) {
           Session::flash('error','email đã tồn tại');
            return redirect()->route('form.register');
        }
        toastr()->success('Đăng kí thành công');
//        Session::flash('success','Đăng kí thành công');
        return redirect()->route('form.register');

    }

    public function showFormLogin()
    {
        return view('login');
    }
    public function login(LoginRequest $request)
    {
        $data =[
            'email'=>$request->email,
            'password'=>$request->password
        ];
        if (!Auth::attempt($data)) {
            toastr()->error('Email hoặc mật khẩu không đúng!');
            return redirect()->route('login');
        }
        return redirect()->route('customers.index');
    }
    public function logout()
    {

        Auth::logout();
        return redirect()->route('login');
    }
}
