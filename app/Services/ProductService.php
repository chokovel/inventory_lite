<?php

namespace App\Services;

use App\Interfaces\ProductInterface;
use App\Models\Product;

class ProductService implements ProductInterface
{
    // public function create($data)
    // {
    //     // $data = [
    //     //     'name' => "My Product"
    //     // ];
    //     return Product::created($data);
    // }

    public function create(array $data): Product
    {
        $product = new Product();
        $product->name = $data['product-name'];
        $product->category = $data['category'];
        $product->price = $data['price'];
        // Save the product
        $product->save();

        // Save product color details
        foreach ($data['color'] as $index => $colorId) {
            $productColor = new ProductColor();
            $productColor->product_id = $product->id;
            $productColor->size_id = $data['size'][$index];
            $productColor->color_id = $colorId;
            $productColor->quantity = $data['quantity'][$index];
            $productColor->save();
        }

        return $product;
    }

    public function getCategories()
    {
        return Category::pluck('name', 'id');
    }

    public function getColors()
    {
        return Color::pluck('name', 'id');
    }

    public function getSizes()
    {
        return Size::pluck('name', 'id');
    }


    public function update($id, array $data): bool
    {
        $product = $this->getById($id);
        return $product->update($data);
    }

     public function getById($id)
    {
        return Product::find($id);
    }

    public function getAll()
    {
        return Product::get();
    }

    public function delete(Product $product): bool
    {
        return $product->delete();
    }

}
