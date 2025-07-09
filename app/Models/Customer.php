<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = ['id'];

   
        // Buyer.php
public function transactions()
{
    return $this->morphMany(Transaction::class, 'customerable');
}
}
