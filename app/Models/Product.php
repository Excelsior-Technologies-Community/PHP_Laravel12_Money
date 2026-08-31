<?php

namespace App\Models;

use Akaunting\Money\Money;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    const CURRENCIES = ['INR', 'USD', 'EUR', 'GBP', 'JPY', 'AUD', 'CAD', 'SGD', 'AED', 'CHF', 'CNY'];

    // Static exchange rates relative to INR (1 unit of currency = X INR)
    const RATES_TO_INR = [
        'INR' => 1,
        'USD' => 83,
        'EUR' => 90,
        'GBP' => 105,
        'JPY' => 0.55,
        'AUD' => 54,
        'CAD' => 61,
        'SGD' => 62,
        'AED' => 22.5,
        'CHF' => 92,
        'CNY' => 11.5,
    ];

    protected $fillable = [
        'name',
        'category',
        'price',
        'currency',
        'image'
    ];

    // Format the stored price using the Laravel Money package.
    // Price is stored in major units, so multiply by the currency's subunit.
    public function getFormattedPriceAttribute()
    {
        $currency = strtoupper($this->currency ?? 'INR');
        $subunit = config("money.currencies.$currency.subunit", 100);

        return Money::{$currency}($this->price * $subunit);
    }

    // Convert this product's price into every other supported currency.
    public function getConvertedPricesAttribute()
    {
        $converted = [];
        $baseInr = $this->price * self::RATES_TO_INR[strtoupper($this->currency)];

        foreach (self::CURRENCIES as $currency) {
            if ($currency === strtoupper($this->currency)) {
                continue;
            }

            $amountInCurrency = $baseInr / self::RATES_TO_INR[$currency];
            $subunit = config("money.currencies.$currency.subunit", 100);
            $minorUnits = round($amountInCurrency * $subunit);

            $converted[$currency] = Money::{$currency}($minorUnits);
        }

        return $converted;
    }

    // Returns a displayable image URL (supports both local storage and remote URLs).
    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return null;
        }

        if (str_starts_with($this->image, 'http://') ||
            str_starts_with($this->image, 'https://')) {
            return $this->image;
        }

        return asset('storage/' . $this->image);
    }
}
