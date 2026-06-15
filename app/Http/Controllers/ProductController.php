<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $category = $request->category;
        $currency = $request->currency;

        $products = Product::query();

        if ($search) {
            $products->where(function ($q) use ($search) {

                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('category', 'like', "%{$search}%")
                    ->orWhere('currency', 'like', "%{$search}%");

                if (is_numeric($search)) {
                    $q->orWhere('price', $search);
                }
            });
        }

        if ($category) {
            $products->where('category', $category);
        }

        if ($currency) {
            $products->where('currency', $currency);
        }

        $products = $products
            ->orderBy('id', 'asc')
            ->paginate(5)
            ->withQueryString();

        $totalProducts = Product::count();
        $totalAmount = Product::sum('price');

        return view('products.index', compact(
            'products',
            'search',
            'category',
            'currency',
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
            'category' => 'required',
            'price' => 'required|numeric|min:1',
            'currency' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {

            $imagePath = $request->file('image')
                ->store('products', 'public');
        }

        Product::create([
            'name' => $request->name,
            'category' => $request->category,
            'price' => $request->price,
            'currency' => $request->currency,
            'image' => $imagePath
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
            'category' => 'required',
            'price' => 'required|numeric|min:1',
            'currency' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $imagePath = $product->image;

        if ($request->hasFile('image')) {

            if (
                $product->image &&
                Storage::disk('public')->exists($product->image)
            ) {

                Storage::disk('public')
                    ->delete($product->image);
            }

            $imagePath = $request->file('image')
                ->store('products', 'public');
        }

        $product->update([
            'name' => $request->name,
            'category' => $request->category,
            'price' => $request->price,
            'currency' => $request->currency,
            'image' => $imagePath
        ]);

        return redirect()
            ->route('products.index')
            ->with('success', 'Product Updated Successfully');
    }

    public function destroy(Product $product)
    {
        if (
            $product->image &&
            Storage::disk('public')->exists($product->image)
        ) {

            Storage::disk('public')
                ->delete($product->image);
        }

        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Product Deleted Successfully');
    }
}
