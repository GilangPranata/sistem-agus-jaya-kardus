<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
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

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function createInvoice()
{
    $prefix = 'INV';
    $date = date('Y.m.d');
    $id = $this->max('id') + 1;
    $invoice = $prefix . '.' . $date . '.' . str_pad($id, 4, '0', STR_PAD_LEFT);
    return $invoice;
}

}
