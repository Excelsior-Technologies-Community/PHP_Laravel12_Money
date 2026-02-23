<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Akaunting\Money\Money;

class Product extends Model
{
    protected $fillable = ['name', 'price'];

    public function getFormattedPriceAttribute()
    {
        return Money::INR($this->price);
    }
}