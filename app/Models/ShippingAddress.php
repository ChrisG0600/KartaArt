<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'full_name',
        'phone_number',
        'house_no',
        'street',
        'barangay',
        'country',
        'city',
        'postal_code',
        'is_default'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
