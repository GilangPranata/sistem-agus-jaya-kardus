<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'email',
        'address',
        'phone',
    ];

   
        // Buyer.php
public function transactions()
{
    return $this->morphMany(Transaction::class, 'customerable');
}
}
