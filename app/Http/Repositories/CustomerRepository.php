<?php

namespace App\Http\Repositories;

use App\City;
use App\Customer;
use test\Mockery\ArgumentObjectTypeHint;

class CustomerRepository
{
    protected $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function getAll()
    {
        return $this->customer->orderBy('id', 'DESC')->paginate(4);
    }

    public function save($customer)
    {
        $customer->save();
    }

    public function findId($id)
    {
        return $this->customer->findOrFail($id);
    }

    public function search($keyword)
    {
        return $this->customer->where('name', 'LIKE', '%' . $keyword . '%')->paginate(4);
    }

    public function filterAjax($id)
    {
        return $this->customer->where('city_id', $id)->get();
    }
}
