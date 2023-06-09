<?php

namespace App\Interfaces;
use App\Models\Category;

interface CategoryInterface
{
    public function create(array $data): Category;

    public function update($id, array $data): bool;

    public function getById($id);

    public function getAll();

    public function delete(Category $category): bool;
}
