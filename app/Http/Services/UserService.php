<?php


namespace App\Http\Services;


use App\Http\Repositories\UserRepository;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected $userRepo;
    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo=$userRepo;
    }
    public function addUser($request)
    {
        $user = new User();
        $user->username = $request->username;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $this->userRepo->save($user);
    }

}
