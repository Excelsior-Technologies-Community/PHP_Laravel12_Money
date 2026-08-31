@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')

    <div class="form-card">
        <a href="{{ route('products.index') }}"
            class="back-btn">
            <i class="bi bi-arrow-left"></i> Back to Dashboard
        </a>

        <div class="icon-box amber">
            <i class="bi bi-pencil-square"></i>
        </div>

        <h2 class="page-title text-center">Edit Product</h2>
        <p class="page-subtitle text-center">Update your product details</p>

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Product Name</label>
                <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Category</label>
                <select name="category" class="form-select" required>
                    <option value="Electronics" {{ $product->category == 'Electronics' ? 'selected' : '' }}>Electronics</option>
                    <option value="Clothing" {{ $product->category == 'Clothing' ? 'selected' : '' }}>Clothing</option>
                    <option value="Books" {{ $product->category == 'Books' ? 'selected' : '' }}>Books</option>
                    <option value="Food" {{ $product->category == 'Food' ? 'selected' : '' }}>Food</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Product Price</label>
                <input type="number" name="price" class="form-control" value="{{ $product->price }}" step="0.01" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Currency</label>
                <select name="currency" class="form-select" required>
                    <option value="INR" {{ $product->currency == 'INR' ? 'selected' : '' }}>INR (₹)</option>
                    <option value="USD" {{ $product->currency == 'USD' ? 'selected' : '' }}>USD ($)</option>
                    <option value="EUR" {{ $product->currency == 'EUR' ? 'selected' : '' }}>EUR (€)</option>
                    <option value="GBP" {{ $product->currency == 'GBP' ? 'selected' : '' }}>GBP (£)</option>
                    <option value="JPY" {{ $product->currency == 'JPY' ? 'selected' : '' }}>JPY (¥)</option>
                    <option value="AUD" {{ $product->currency == 'AUD' ? 'selected' : '' }}>AUD (A$)</option>
                    <option value="CAD" {{ $product->currency == 'CAD' ? 'selected' : '' }}>CAD (C$)</option>
                    <option value="SGD" {{ $product->currency == 'SGD' ? 'selected' : '' }}>SGD (S$)</option>
                    <option value="AED" {{ $product->currency == 'AED' ? 'selected' : '' }}>AED</option>
                    <option value="CHF" {{ $product->currency == 'CHF' ? 'selected' : '' }}>CHF</option>
                    <option value="CNY" {{ $product->currency == 'CNY' ? 'selected' : '' }}>CNY (CN¥)</option>
                </select>
            </div>

            @if($product->image)
            <div class="mb-3 text-center">
                <img src="{{ $product->image_url }}" width="120" height="120"
                    style="object-fit:contain;border-radius:12px;">
            </div>
            @endif

            <div class="mb-4">
                <label class="form-label">Change Product Image</label>
                <input type="file" name="image" class="form-control">
            </div>

            <button type="submit" class="submit-btn">
                <i class="bi bi-check-circle"></i> Update Product
            </button>
        </form>
    </div>

@endsection
