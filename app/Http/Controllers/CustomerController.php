<?php

namespace App\Http\Controllers;

use App\City;
use App\Customer;
use App\Http\Requests\CreateCustomerRequest;
use App\Http\Services\CityService;
use App\Http\Services\CustomerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        if (Auth::check()) {
            $cities = $this->cityService->getAll();
            $customers = $this->customerService->all();
            return view('layouts.customers.list', compact('customers', 'cities'));
        }
       return view('login');
    }

    public function create()
    {
        $cities = $this->cityService->getAll();
        return view('layouts.customers.create', compact('cities'));
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
        return view('layouts.customers.edit', compact('customer', 'cities'));
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
        $result = [
            'status' => 'success',
            'message' => 'xoa thanh cong'
        ];
        return response()->json($result);
    }

    public function search(Request $request)
    {
        $cities = $this->cityService->getAll();
        $customers = $this->customerService->search($request);
        return view('layouts.customers.list', compact('customers', 'cities'));
    }
    public function filterAjax($id)
    {
        $customers = $this->customerService->fitterAjax($id);
        return response()->json($customers);
    }

}
