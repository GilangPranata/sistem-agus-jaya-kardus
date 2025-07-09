<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collector extends Model
{
    protected $guarded = ['id'];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
        // Buyer.php
public function transactions()
{
    return $this->morphMany(Transaction::class, 'customerable');
}

    public function requestOrders()
    {
        return $this->hasMany(RequestOrder::class);
    }
    
}
