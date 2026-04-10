<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'products';
    
    protected $fillable = [

        'name',
        'image',
        'price',
        'quantity',

    ];

    public function invoices()
{
    return $this->belongsToMany(Invoice::class)
        ->withPivot('quantity', 'price')
        ->withTimestamps();
}

}
