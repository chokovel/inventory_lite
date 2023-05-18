<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

     protected $fillable = [
        'date',
        'expense_title',
        'amount',
        'details',
        'expense_category_id',
    ];

    public function expensecategory()
    {
        return $this->belongsTo(ExpenseCategory::class, 'expense_category_id');
    }
}
