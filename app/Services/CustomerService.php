<?php

namespace App\Services;

use App\Interfaces\CustomerInterface;
use App\Models\Customer;

class CustomerService implements CustomerInterface
{

    public function create(array $data): Customer
    {
         $customer = new Customer();

        $customer->name = $data['name'];
        $customer->email = $data['email'];
        $customer->phone = $data['phone'];
        $customer->dob = $data['dob'];
        $customer->address = $data['address'];
        $customer->note = $data['note'];

        $customer->save();

        return $customer;
    }

    public function update($id, array $data): bool
    {
        $customer = $this->getById($id);
        return $customer->update($data);
    }

     public function getById($id)
    {
        return Customer::find($id);
    }

    public function getAll()
    {
        return Customer::get();
    }

    public function delete(Customer $customer): bool
    {
        return $customer->delete();
    }

}
