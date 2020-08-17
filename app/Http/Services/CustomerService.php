<?php

namespace App\Http\Services;

use App\Customer;
use App\Http\Repositories\CustomerRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CustomerService
{
    protected $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function all()
    {
        return $this->customerRepository->getAll();
    }

    public function addCustomer($request)
    {
        $customer = new Customer();
        //upload file anh

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('image', 'public');
            $customer->image = $path;
        }
        $customer->city_id = $request->input('city_id');
        $customer->name = $request->input('name');
        $customer->date = $request->input('date');
        $customer->email = $request->input('email');
        $this->customerRepository->save($customer);
    }

    public function findId($id)
    {
        return $this->customerRepository->findId($id);
    }

    public function updateCustomer($request, $id)
    {
        $customer = $this->customerRepository->findId($id);

        //cap nhat anh
        if ($request->hasFile('image')) {
//xoa anh cu neu co
            $customerImg = $customer->image;
            if ($customerImg) {
                Storage::delete('/public' . $customerImg);
            }
            //cap nhat anh moi
            $image = $request->file('image');
            $path = $image->store('image', 'public');
            $customer->image = $path;
        }
        $customer->name = $request->input('name');
        $customer->city_id = $request->input('city_id');
        $customer->date = $request->input('date');
        $customer->email = $request->input('email');
        $this->customerRepository->save($customer);
    }

    public function deleteCustomer($id)
    {
        $customer = $this->customerRepository->findId($id);
        $image = $customer->image;
        //xoa anh
        if ($image) {
            Storage::delete('/public/image');
           $customer->delete();
        }

    }


}
