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
        // Lấy thông tin đang nhập từ request được gửi lên từ trình duyệt
        $email = $request->email;
        $password = $request->password;
        $users = $this->user->all();
        foreach ($users as $user){
            if ($email == $user->email && $password == $user->password) {
                //Nếu thông tin đăng nhập chính xác, Tạo một Session lưu trữ trạng thái đăng nhập
                $request->session()->push('login', true);
                $userLogin = User::where('email',$request->email)->first();
                Session::put('userLogin',$userLogin);
                // Đi đến route show.blog, để chuyển hướng người dùng đến trang blog
                return redirect()->route('customers.index');
            }
        }
        // Nếu thông tin đăng nhập không chính xác, gán thông báo vào Session
        $message = 'Đăng nhập không thành công. Tên người dùng hoặc mật khẩu không đúng.';
        $request->session()->flash('login-fail', $message);

        //Quay trở lại trang đăng nhập
        return view('login');
    }
}
