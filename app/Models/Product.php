<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'currency'
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