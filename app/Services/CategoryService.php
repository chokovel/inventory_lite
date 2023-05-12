<?php

namespace App\Services;

use App\Interfaces\CategoryInterface;
use App\Models\Category;

class CategoryService implements CategoryInterface
{
    // public function create($data)
    // {
    //     // $data = [
    //     //     'name' => "My Category"
    //     // ];
    //     return Category::created($data);
    // }

    public function create(array $data): Category
    {
        $category = new Category();
        $category->name = $data['name'];
        $category->save();
        return $category;
    }

    public function update($id, array $data): bool
    {
        $category = $this->getById($id);
        return $category->update($data);
    }

     public function getById($id)
    {
        return Category::find($id);
    }

    public function getAll()
    {
        return Category::get();
    }

    public function delete(Category $category): bool
    {
        return $category->delete();
    }

}
