<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['product_name', 'category_id', 'price', 'image', 'note'];

    public function productColors(): HasMany
    {
        return $this->hasMany(ProductColor::class, 'product_id', 'id');
    }

    public function saleCarts(): HasManyThrough
    {
        return $this->hasManyThrough(
            SaleCart::class,
            ProductColor::class,
            'product_id',
            'product_color_id',
            'id',
            'id'
        );
    }

    public function productReturns(): HasManyThrough
    {
        return $this->hasManyThrough(
            ProductReturn::class,
            ProductColor::class,
            'product_id',
            'product_color_id',
            'id',
            'id'
        );
    }
}
