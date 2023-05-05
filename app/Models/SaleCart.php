<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleCart extends Model
{
    use HasFactory;

     protected $fillable = [
        'product_color_id',
        'customer_id',
    ];
}
