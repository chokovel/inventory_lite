<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'price',
        'quantity',
        'size',
        'color',
        'date',
        'supplier_id',
        'note',
        'image',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    // public function product()
    // {
    //     return $this->belongsTo(Product::class);
    // }
}
