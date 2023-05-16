<?php

namespace App\Interfaces;

use App\Models\Customer;

interface CustomerInterface
{
    public function create(array $data): Customer;

    public function update($id, array $data): bool;

    public function getById($id);

    public function getAll();

    public function delete(Customer $customer): bool;

    public function getByPhoneOrEmail($input);
}
