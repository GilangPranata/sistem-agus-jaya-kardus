<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = ['id'];

    public function transactionable()
    {
        return $this->morphTo();
    }
    public function customerable()
{
    return $this->morphTo();
}

public function transactionProducts()
{
    return $this->hasMany(TransactionProducts::class);

}
}
