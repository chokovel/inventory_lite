<?php

namespace App\Services;

use App\Interfaces\ExpenseInterface;
use App\Models\Expense;
use App\Models\ExpenseCategory;

class ExpenseService implements ExpenseInterface
{

    public function create(array $data): Expense
    {
        $expense = new Expense();

        $expense->date = $data['date'];
        $expense->expense_title = $data['expense_title'];
        $expense->amount = $data['amount'];
        $expense->details = $data['details'];
        $expense->expense_category_id = $data['expense_category_id'];

        $expense->save();

        return $expense;
    }

    public function update($id, array $data): bool
    {
        $expense = $this->getById($id);
        return $expense->update($data);
    }

    public function getById($id)
    {
        return Expense::find($id);
    }

    public function getAll()
    {
        return Expense::get();
    }

    public function delete(Expense $expense): bool
    {
        return $expense->delete();
    }

    public function getByPhoneOrEmail($input)
    {
        return Expense::with('saleCarts.productColor.product')
            ->where('email', $input)->orWhere('phone', $input)->first();
    }
}
