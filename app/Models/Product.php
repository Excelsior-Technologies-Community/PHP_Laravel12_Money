<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'category',
        'price',
        'currency',
        'image'
    ];

    public function getFormattedPriceAttribute()
    {
        $symbols = [
            'INR' => '₹',
            'USD' => '$',
            'EUR' => '€',
        ];

        $symbol = $symbols[$this->currency] ?? '';

        return $symbol . number_format($this->price, 2);
    }
}