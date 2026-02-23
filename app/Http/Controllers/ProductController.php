<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'currency' => 'required'
        ]);

        Product::create([
            'name' => $request->name,
            'price' => $request->price * 100, // cents
            'currency' => $request->currency
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully');
    }
}