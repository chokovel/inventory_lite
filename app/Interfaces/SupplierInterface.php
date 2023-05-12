<?php

namespace App\Interfaces;

use App\Models\Supplier;

Interface SupplierInterface
{
    public function create(array $data): Supplier;

    public function update($id, array $data): bool;

    // public function update(Supplier $supplier, array $data): Supplier;

    public function getById($id);

    public function getAll();

    public function delete(Supplier $supplier): bool;
}
