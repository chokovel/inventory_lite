<?php

namespace App\Interfaces;

use App\Models\Product;
use App\Models\ProductColor;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;

Interface ProductInterface
{
    public function create(array $data): Product;

    public function getCategories();
    public function getColors();
    public function getSizes();

    public function update($id, array $data): bool;

    public function getById($id);

    public function getAll();

    public function delete(Product $product): bool;
}


