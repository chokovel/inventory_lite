<?php

namespace App\Interfaces;

use App\Models\Purchase;

Interface PurchaseInterface
{
    public function create(array $data): Purchase;

    public function update($id, array $data): bool;

    public function getById($id);

    public function getAll();

    public function delete(Purchase $purchase): bool;
}
