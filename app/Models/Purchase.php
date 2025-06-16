<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{

    protected $fillable = [
        'invoice',
        'product_id',
        'qty',
        'price',
        'customer_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function collector()
    {
        return $this->belongsTo(Collector::class);
    }

    public function createInvoice()
{
    $prefix = 'INV-prcs';
    $date = date('Y.m.d');
    $id = $this->max('id') + 1;
    $invoice = $prefix . '.' . $date . '.' . str_pad($id, 4, '0', STR_PAD_LEFT);
    return $invoice;
}

public function transactions()
{
    return $this->morphMany(\App\Models\Transaction::class, 'transactionable');
}

}
