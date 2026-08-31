@extends('layouts.app')

@section('title', 'Add Product')

@section('content')

    <div class="form-card">
        <a href="{{ route('products.index') }}"
            class="back-btn">
            <i class="bi bi-arrow-left"></i> Back to Dashboard
        </a>

        <div class="icon-box">
            <i class="bi bi-bag-plus"></i>
        </div>

        <h2 class="page-title text-center">Add Product</h2>
        <p class="page-subtitle text-center">Create a new product with money details</p>

        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Product Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter product name" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Category</label>
                <select name="category" class="form-select" required>
                    <option value="">Select Category</option>
                    <option value="Electronics">Electronics</option>
                    <option value="Clothing">Clothing</option>
                    <option value="Books">Books</option>
                    <option value="Food">Food</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Product Price</label>
                <input type="number" name="price" class="form-control" placeholder="Enter product price" step="0.01" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Currency</label>
                <select name="currency" class="form-select" required>
                    <option value="INR">INR (₹)</option>
                    <option value="USD">USD ($)</option>
                    <option value="EUR">EUR (€)</option>
                    <option value="GBP">GBP (£)</option>
                    <option value="JPY">JPY (¥)</option>
                    <option value="AUD">AUD (A$)</option>
                    <option value="CAD">CAD (C$)</option>
                    <option value="SGD">SGD (S$)</option>
                    <option value="AED">AED</option>
                    <option value="CHF">CHF</option>
                    <option value="CNY">CNY (CN¥)</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="form-label">Product Image</label>
                <input type="file" name="image" class="form-control">
            </div>

            <button type="submit" class="submit-btn">
                <i class="bi bi-check-circle"></i> Save Product
            </button>
        </form>
    </div>

@endsection
