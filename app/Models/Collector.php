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

    public function requestOrders()
    {
        return $this->hasMany(RequestOrder::class);
    }
    
}
