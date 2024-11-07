<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'image',
        'user_id',
        'artwork_id',
    ];

    public function artwork()
    {
        return $this->belongsTo(Artwork::class, 'artwork_id');
    }
}
