<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'sector_id',
        'name',
        'slug',
        'description',
    ];

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

    public function types()
    {
        return $this->hasMany(ProductType::class);
    }

    public function prices()
    {
        return $this->hasMany(ProductPrice::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
