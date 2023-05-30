<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Color extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function productColors(): HasMany
    {
        return $this->hasMany(ProductColor::class, 'color_id', 'id');
    }
    public function products()
    {
        return $this->hasManyThrough(Product::class, ProductColor::class, 'color_id', 'id', 'id', 'product_id');
    }

}
