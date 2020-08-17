<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user =$user;
    }

    public function showLogin()
    {
        return view('login');

    }
    public function formLogin()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $users = $this->user->all();
        foreach ($users as $user){
            if ($email == $user->email && $password == $user->password) {
                $request->session()->push('login', true);
                $userLogin = User::where('email',$request->email)->first();
                Session::put('userLogin',$userLogin);
                return redirect()->route('customers.index');
            }
        }
        $message = 'Đăng nhập không thành công. Tên người dùng hoặc mật khẩu không đúng.';
        $request->session()->flash('login-fail', $message);
        return view('login');
    }
}
