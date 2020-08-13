<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function formRegister()
    {
        return view('register');

    }
    public function addUser(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email =$request->input('email');
        $user->password =$request->input('password');
        $user->save();
        Session::flash('success','dang ki thanh cong');
        return redirect()->route('form.register');
    }


}
