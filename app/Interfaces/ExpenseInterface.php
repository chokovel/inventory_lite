<?php

namespace App\Interfaces;

use App\Models\Expense;

interface ExpenseInterface
{
    public function create(array $data): Expense;

    public function update($id, array $data): bool;

    public function getById($id);

    public function getAll();

    public function delete(Expense $expense): bool;

    public function getByPhoneOrEmail($input);
}
