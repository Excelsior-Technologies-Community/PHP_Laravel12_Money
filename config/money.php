<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Currency
    |--------------------------------------------------------------------------
    */

    'default' => 'INR',

    /*
    |--------------------------------------------------------------------------
    | Currency Configuration
    |--------------------------------------------------------------------------
    */

    'currencies' => [

        'INR' => [
            'code' => 'INR',
            'symbol' => '₹',
            'name' => 'Indian Rupee',
            'precision' => 2,
            'subunit' => 100,
            'symbol_first' => true,
            'decimal_mark' => '.',
            'thousands_separator' => ',',
        ],

        'USD' => [
            'code' => 'USD',
            'symbol' => '$',
            'name' => 'US Dollar',
            'precision' => 2,
            'subunit' => 100,
            'symbol_first' => true,
            'decimal_mark' => '.',
            'thousands_separator' => ',',
        ],

        'EUR' => [
            'code' => 'EUR',
            'symbol' => '€',
            'name' => 'Euro',
            'precision' => 2,
            'subunit' => 100,
            'symbol_first' => true,
            'decimal_mark' => '.',
            'thousands_separator' => ',',
        ],

        'GBP' => [
            'code' => 'GBP',
            'symbol' => '£',
            'name' => 'British Pound',
            'precision' => 2,
            'subunit' => 100,
            'symbol_first' => true,
            'decimal_mark' => '.',
            'thousands_separator' => ',',
        ],

        'JPY' => [
            'code' => 'JPY',
            'symbol' => '¥',
            'name' => 'Japanese Yen',
            'precision' => 0,
            'subunit' => 1,
            'symbol_first' => true,
            'decimal_mark' => '.',
            'thousands_separator' => ',',
        ],

        'AUD' => [
            'code' => 'AUD',
            'symbol' => 'A$',
            'name' => 'Australian Dollar',
            'precision' => 2,
            'subunit' => 100,
            'symbol_first' => true,
            'decimal_mark' => '.',
            'thousands_separator' => ',',
        ],

        'CAD' => [
            'code' => 'CAD',
            'symbol' => 'C$',
            'name' => 'Canadian Dollar',
            'precision' => 2,
            'subunit' => 100,
            'symbol_first' => true,
            'decimal_mark' => '.',
            'thousands_separator' => ',',
        ],

        'SGD' => [
            'code' => 'SGD',
            'symbol' => 'S$',
            'name' => 'Singapore Dollar',
            'precision' => 2,
            'subunit' => 100,
            'symbol_first' => true,
            'decimal_mark' => '.',
            'thousands_separator' => ',',
        ],

        'AED' => [
            'code' => 'AED',
            'symbol' => 'AED',
            'name' => 'UAE Dirham',
            'precision' => 2,
            'subunit' => 100,
            'symbol_first' => true,
            'decimal_mark' => '.',
            'thousands_separator' => ',',
        ],

        'CHF' => [
            'code' => 'CHF',
            'symbol' => 'CHF',
            'name' => 'Swiss Franc',
            'precision' => 2,
            'subunit' => 100,
            'symbol_first' => true,
            'decimal_mark' => '.',
            'thousands_separator' => '.',
        ],

        'CNY' => [
            'code' => 'CNY',
            'symbol' => 'CN¥',
            'name' => 'Chinese Yuan',
            'precision' => 2,
            'subunit' => 100,
            'symbol_first' => true,
            'decimal_mark' => '.',
            'thousands_separator' => ',',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Formatting
    |--------------------------------------------------------------------------
    */

    'format' => '%s%v',

];