<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   
public function index(Request $request)
{
    $search = $request->search;

    $products = Product::when($search, function ($query) use ($search) {

        $query->where(function ($q) use ($search) {

            // Name Search
            $q->where('name', 'like', "%{$search}%")

              // Currency Search
              ->orWhere('currency', 'like', "%{$search}%");

            // Price Search
            if (is_numeric(str_replace(',', '', $search))) {

                $price = str_replace(',', '', $search);

                $q->orWhere('price', $price);
            }

        });

    })
    ->latest()
    ->paginate(5);

    $totalProducts = Product::count();

    $totalAmount = Product::sum('price');

    return view('products.index', compact(
        'products',
        'search',
        'totalProducts',
        'totalAmount'
    ));
}


    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|min:1',
            'currency' => 'required'
        ]);

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'currency' => $request->currency
        ]);

        return redirect()
            ->route('products.index')
            ->with('success', 'Product Created Successfully');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|min:1',
            'currency' => 'required'
        ]);

        $product->update([
            'name' => $request->name,
            'price' => $request->price * 100,
            'currency' => $request->currency
        ]);

        return redirect()
            ->route('products.index')
            ->with('success', 'Product Updated Successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Product Deleted Successfully');
    }
}