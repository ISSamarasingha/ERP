<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// app/Models/Invoice.php
class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'total'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'invoice_product')
            ->withPivot('quantity', 'price')
            ->withTimestamps();
    }

    public function invoices() {
    return $this->belongsToMany(Invoice::class, 'invoice_product')
                ->withPivot('quantity', 'price')
                ->withTimestamps();
}


}
