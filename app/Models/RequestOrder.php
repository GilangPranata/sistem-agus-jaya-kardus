<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestOrder extends Model
{
    
    public function collector()
    {
        return $this->belongsTo(Collector::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
