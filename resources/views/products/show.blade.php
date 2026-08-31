@extends('layouts.app')

@section('title', 'Product Details')

@section('content')

    <div class="detail-card">
        <a href="{{ route('products.index') }}"
            class="back-btn">
            <i class="bi bi-arrow-left"></i> Back to Dashboard
        </a>

        <div class="icon-box cyan">
            <i class="bi bi-eye"></i>
        </div>

        <h2 class="page-title text-center">{{ $product->name }}</h2>
        <p class="page-subtitle text-center">Product Details & Multi-Currency View</p>

        @if($product->image)
        <div class="text-center mb-4">
            <img src="{{ $product->image_url }}" class="product-img" alt="{{ $product->name }}">
        </div>
        @endif

        <div class="info-row">
            <span class="info-label"><i class="bi bi-hash"></i> Product ID</span>
            <span class="info-value">#{{ $product->id }}</span>
        </div>

        <div class="info-row">
            <span class="info-label"><i class="bi bi-tag"></i> Category</span>
            <span class="badge bg-primary">{{ $product->category }}</span>
        </div>

        <div class="info-row">
            <span class="info-label"><i class="bi bi-cash-stack"></i> Price</span>
            <span class="price" style="font-size:20px;">{{ $product->formatted_price }}</span>
        </div>

        <div class="info-row">
            <span class="info-label"><i class="bi bi-currency-exchange"></i> Currency</span>
            <span class="currency-badge">{{ $product->currency }}</span>
        </div>

        <!-- Currency Conversion -->
        <div class="conversion-box">
            <div class="conversion-title">
                <i class="bi bi-arrow-left-right"></i> Converted Prices
            </div>

            @foreach($product->converted_prices as $currency => $money)
            <div class="conversion-row">
                <span>{{ $currency }}</span>
                <span class="price">{{ $money }}</span>
            </div>
            @endforeach

            <small class="text-secondary d-block mt-2">
                Static demo rates: 1 USD = 83 INR, 1 EUR = 90 INR
            </small>
        </div>

        <div class="action-row">
            <a href="{{ route('products.edit', $product->id) }}"
                class="btn-action btn-action-edit">
                <i class="bi bi-pencil-square"></i> Edit
            </a>

            <form action="{{ route('products.destroy', $product->id) }}"
                method="POST"
                class="d-inline"
                style="flex:1;">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="btn-action btn-action-delete"
                    onclick="return confirm('Delete Product?')">
                    <i class="bi bi-trash"></i> Delete
                </button>
            </form>
        </div>
    </div>

@endsection
