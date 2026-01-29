<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'name',
    ];

    // Jenis milik satu produk
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Jenis punya banyak harga
    public function prices()
    {
        return $this->hasMany(ProductPrice::class);
    }
}
