<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionProducts extends Model
{
    protected $guarded = ['id'];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
