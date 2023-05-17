<?php

namespace App\Services;

use App\Interfaces\ExpenseExpenseCategoryInterface;
use App\Models\ExpenseCategory;

class ExpenseCategoryService implements ExpenseExpenseCategoryInterface
{
    // public function create($data)
    // {
    //     // $data = [
    //     //     'name' => "My ExpenseCategory"
    //     // ];
    //     return ExpenseCategory::created($data);
    // }

    public function create(array $data): ExpenseCategory
    {
        $expensecategory = new ExpenseCategory();
        $expensecategory->name = $data['name'];
        $expensecategory->save();
        return $expensecategory;
    }

    public function update($id, array $data): bool
    {
        $expensecategory = $this->getById($id);
        return $expensecategory->update($data);
    }

     public function getById($id)
    {
        return ExpenseCategory::find($id);
    }

    public function getAll()
    {
        return ExpenseCategory::get();
    }

    public function delete(ExpenseCategory $expensecategory): bool
    {
        return $expensecategory->delete();
    }

}
