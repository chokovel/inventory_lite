<?php

namespace App\Services;

use App\Interfaces\SupplierInterface;
use App\Models\Supplier;

class SupplierService implements SupplierInterface
{

    public function create(array $data): Supplier
    {
         $supplier = new Supplier();

        $supplier->name = $data['name'];
        $supplier->email = $data['email'];
        $supplier->phone = $data['phone'];
        $supplier->country = $data['country'];
        $supplier->address = $data['address'];
        $supplier->note = $data['note'];

        $supplier->save();

        return $supplier;
    }

    public function update($id, array $data): bool
    {
        $supplier = $this->getById($id);
        return $supplier->update($data);
    }

     public function getById($id)
    {
        return Supplier::find($id);
    }

    public function getAll()
    {
        return Supplier::get();
    }

    public function delete(Supplier $supplier): bool
    {
        return $supplier->delete();
    }

}
