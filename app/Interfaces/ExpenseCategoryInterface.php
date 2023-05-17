<?php

namespace App\Interfaces;
use App\Models\ExpenseCategory;

interface ExpenseCategoryInterface
{
    public function create(array $data): ExpenseCategory;

    public function update($id, array $data): bool;

    public function getById($id);

    public function getAll();

    public function delete(ExpenseCategory $expensecategory): bool;
}
