<?php

namespace App\Http\Controllers;

use App\City;
use App\Http\Services\CityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CityController extends Controller
{
    protected $cityService;
    public function __construct(CityService $cityService)
    {
        $this->cityService=$cityService;
    }
    public function index()
    {
        $cities =$this->cityService->getAll();
        return view('cities.list',compact('cities'));
    }
    public function create()
    {
        return view('cities.create');
    }
    public function store(Request $request)
    {
        $this->cityService->addCity($request);
        Session::flash('success','Thêm thông tin thành phố thành công');
        return redirect()->route('cities.index');
    }
    public function edit($id)
    {
       $city = $this->cityService->findId($id);
        return view('cities.edit',compact('city'));
    }
    public function update(Request $request,$id)
    {
        $this->cityService->updateCity($request,$id);
        Session::flash('success','Cập nhật thông tin thành công');
        return redirect()->route('cities.index');
    }
    public function delete($id)
    {
        $this->cityService->deleteCity($id);
        Session::flash('success','Xóa thành phố thành công');
        return redirect()->route('cities.index');
    }
    public function showBlog(Request $request)
    {
        // Kiểm tra Session login có tồn tại hay không
        if ($request->session()->has('login') && $request->session()->get('login')) {

            // Session login tồn tại và có giá trị là true, chuyển hướng người dùng đến trang blog
            return view('home');
        }

        // Session không tồn tại, người dùng chưa đăng nhập
        // Gán một thông báo vào Session not-login
        $message = 'Bạn chưa đăng nhập.';
        $request->session()->flash('not-login', $message);

        // Chuyển hướng về trang đăng nhập
        return view('login');
    }
}
