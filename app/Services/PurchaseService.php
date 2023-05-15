<?php

namespace App\Services;

use App\Interfaces\PurchaseInterface;
use App\Models\Purchase;

class PurchaseService implements PurchaseInterface
{

    public function create(array $data): Purchase
    {
         $purchase = new Purchase();

        $purchase->product_name = $data['product_name'];
        $purchase->price = $data['price'];
        $purchase->quantity = $data['quantity'];
        $purchase->size = $data['size'];
        $purchase->color = $data['color'];
        $purchase->date = $data['date'];
        $purchase->image = $data['image'];
        $purchase->supplier_id = $data['supplier_id'];

        $purchase->save();

        return $purchase;
    }

    public function update($id, array $data): bool
    {
        $purchase = $this->getById($id);
        return $purchase->update($data);
    }

     public function getById($id)
    {
        return Purchase::find($id);
    }

    public function getAll()
    {
        return Purchase::get();
    }

    public function delete(Purchase $purchase): bool
    {
        return $purchase->delete();
    }

}
