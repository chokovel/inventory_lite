<?php

namespace App\Services;

use App\Interfaces\CategoryInterface;
use App\Models\Category;

class CategoryService implements CategoryInterface
{
    public function create($data)
    {
        // $data = [
        //     'name' => "My Category"
        // ];
        return Category::created($data);
    }

    public function update($data, $id)
    {
        $category = $this->getById($id);
        $category->update($data);
    }

    public function getById($id)
    {
        return Category::where('id', $id)->first();
    }

    public function getAll()
    {
        return Category::get();
    }
}
