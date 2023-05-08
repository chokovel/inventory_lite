<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['product_name', 'category_id', 'price', 'image', 'note'];

    public function productColors(): HasMany
    {
        return $this->hasMany(ProductColor::class, 'product_id', 'id');
    }
}
