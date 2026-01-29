<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'title', 
        'year', 
        'published_at', 
        'file_size', 
        'file_path',
        'user_id'
    ];

    protected $casts = [
        'published_at' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
