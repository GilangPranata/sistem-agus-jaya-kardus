<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = ['id'];

    public function createInvoice()
    {
        $prefix = 'INV';
        $date = date('Y.m.d');
        $id = $this->max('id') + 1;
        $invoice = $prefix . '.' . $date . '.' . str_pad($id, 4, '0', STR_PAD_LEFT);
        return $invoice;
    }

    public function transactionable()
    {
        return $this->morphTo();
    }
    public function customer()
{
    return $this->belongsTo(Customer::class);
}

public function transactionProducts()
{
    return $this->hasMany(TransactionProducts::class);

}
}
