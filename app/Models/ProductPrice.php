<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    protected $fillable = [
        'product_id',
        'product_type_id',
        'price_standard_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function type()
    {
        return $this->belongsTo(ProductType::class, 'product_type_id');
    }

    public function standard()
    {
        return $this->belongsTo(PriceStandard::class, 'price_standard_id');
    }

    public function prices()
    {
        return $this->hasMany(ProductPrice::class);
    }

}
