<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PriceStandard extends Model
{
    protected $fillable = [
        'mutu',
        'thickness',
        'price',
        'unit',
    ];

    public function productPrices()
    {
        return $this->hasMany(ProductPrice::class);
    }
}
