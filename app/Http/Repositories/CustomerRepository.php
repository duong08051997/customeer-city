<?php
namespace App\Http\Repositories;

use App\City;
use App\Customer;

class CustomerRepository
{
    protected $customer;

    public function __construct(Customer $customer)
    {
        $this->customer=$customer;
    }
    public function getAll()
    {
       return $this->customer->paginate(5);

    }
    public function save($customer)
    {
        $customer->save();
    }
    public function findId($id)
    {
        return $this->customer->findOrFail($id);
    }


}
