<?php

namespace App\Http\Controllers;

use App\City;
use App\Customer;
use App\Http\Requests\CreateCustomerRequest;
use App\Http\Services\CityService;
use App\Http\Services\CustomerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    protected $cityService;
    protected $customerService;

    public function __construct(CustomerService $customerService, CityService $cityService)
    {
        $this->cityService = $cityService;
        $this->customerService = $customerService;
    }

    public function index()
    {
        $cities = $this->cityService->getAll();
        $customers = $this->customerService->all();
        return view('customers.list', compact('customers', 'cities'));
    }

    public function create()
    {
        $cities = $this->cityService->getAll();
        return view('customers.create', compact('cities'));
    }

    public function store(CreateCustomerRequest $request)
    {
        $this->customerService->addCustomer($request);
        Session::flash('success', 'Thêm thông tin khách hàng thành công');
        return redirect()->route('customers.index');
    }

    public function edit($id)
    {
        $customer = $this->customerService->findId($id);
        $cities = $this->cityService->getAll();
        return view('customers.edit', compact('customer', 'cities'));
    }

    public function update(Request $request, $id)
    {
        $this->customerService->updateCustomer($request, $id);
        Session::flash('success', 'Cập nhật thành công');
        return redirect()->route('customers.index');
    }

    public function delete($id)
    {
        $this->customerService->deleteCustomer($id);
        Session::flash('success', 'Xóa thông tin khách hàng thành công');
        return redirect()->route('customers.index');
    }
    public function filterByCity(Request $request)
    {
        $idCity = $request->input('city_id');
        //kiem tra city co ton tai khong
        $cityFilter = $this->cityService->findId($idCity);
        //lay ra tat ca customer cua cityFilter
        $customers = Customer::where('city_id',$cityFilter->id)->paginate(5);
        $totalCustomerFilter =count($customers);
        $cities = $this->cityService->getAll();
        return view('customers.list',compact('customers','cities','totalCustomerFilter','cityFilter'));

    }
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        if (!$keyword) {
            return redirect()->route('customers.index');
        }
        $customers = Customer::where('name','LIKE','%'.$keyword.'%')->paginate(5);
       $cities = $this->cityService->getAll();
        return view('customers.list',compact('customers','cities'));
    }


}
