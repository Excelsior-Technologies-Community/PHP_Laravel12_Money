@extends('layouts.app')

@section('title', 'Money Dashboard')

@section('content')

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="page-title">
                <i class="bi bi-cash-stack" ></i> Money Dashboard
            </h1>
            <p class="page-subtitle">Manage products and money records</p>
        </div>

        <a href="{{ route('products.create') }}"
            class="app-nav-link btn-add-nav">
            <i class="bi bi-plus-circle"></i> Add Product
        </a>
    </div>

    <!-- Stats -->
    <div class="row g-4 mb-4">
        <div class="col-md-6">
            <div class="stats-card">
                <div class="stats-icon bg-blue">
                    <i class="bi bi-box-seam"></i>
                </div>
                <div class="stats-title">Total Products</div>
                <div class="stats-value">{{ $totalProducts }}</div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="stats-card">
                <div class="stats-icon bg-green">
                    <i class="bi bi-currency-rupee"></i>
                </div>
                <div class="stats-title">Total Amount (stored)</div>
                <div class="stats-value">₹ {{ number_format($totalAmount, 2) }}</div>
            </div>
        </div>
    </div>

    <!-- Search + Filter -->
    <form method="GET" class="row g-3 align-items-end mb-4">
        <div class="col-lg-4 col-md-12">
            <label class="form-label text-light mb-2">Search Product</label>
            <input type="text"
                name="search"
                class="form-control search-box"
                placeholder="Search by Name, Category, Currency or Price"
                value="{{ request('search') }}">
        </div>

        <div class="col-lg-3 col-md-6">
            <label class="form-label text-light mb-2">Category</label>
            <select name="category"
                class="form-select search-box">
                <option value="">All Categories</option>
                <option value="Electronics" {{ request('category') == 'Electronics' ? 'selected' : '' }}>Electronics</option>
                <option value="Clothing" {{ request('category') == 'Clothing' ? 'selected' : '' }}>Clothing</option>
                <option value="Books" {{ request('category') == 'Books' ? 'selected' : '' }}>Books</option>
                <option value="Food" {{ request('category') == 'Food' ? 'selected' : '' }}>Food</option>
            </select>
        </div>

        <div class="col-lg-3 col-md-6">
            <label class="form-label text-light mb-2">Currency</label>
            <select name="currency"
                class="form-select search-box">
                <option value="">All Currency</option>
                <option value="INR" {{ request('currency') == 'INR' ? 'selected' : '' }}>INR</option>
                <option value="USD" {{ request('currency') == 'USD' ? 'selected' : '' }}>USD</option>
                <option value="EUR" {{ request('currency') == 'EUR' ? 'selected' : '' }}>EUR</option>
            </select>
        </div>

        <div class="col-lg-2 col-md-12">
            <div class="d-flex gap-2">
                <button type="submit"
                    class="btn btn-primary flex-fill"
                    style="border-radius:12px;background:#2563eb;border:none;height:46px;">
                    <i class="bi bi-funnel-fill"></i>
                </button>
                <a href="{{ route('products.index') }}"
                    class="btn btn-secondary flex-fill"
                    style="border-radius:12px;background:#334155;border:none;height:46px;">
                    <i class="bi bi-arrow-clockwise"></i>
                </a>
            </div>
        </div>
    </form>

    <!-- Table -->
    <div class="table-card">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Currency</th>
                        <th>Image</th>
                        <th width="200">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                    <tr>
                        <td>#{{ $product->id }}</td>
                        <td class="product-name">{{ $product->name }}</td>
                        <td><span class="badge bg-primary">{{ $product->category }}</span></td>
                        <td class="price">{{ $product->formatted_price }}</td>
                        <td><span class="currency-badge">{{ $product->currency }}</span></td>
                        <td>
                            @if($product->image)
                            <img src="{{ $product->image_url }}"
                                width="90" height="70"
                                style="object-fit:contain;border-radius:10px;">
                            @else
                            <span class="text-secondary">No Image</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('products.show', $product->id) }}"
                                class="btn btn-view btn-sm me-1" title="View">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('products.edit', $product->id) }}"
                                class="btn btn-edit btn-sm me-1" title="Edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('products.destroy', $product->id) }}"
                                method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="btn btn-delete btn-sm"
                                    onclick="return confirm('Delete Product?')"
                                    title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7">
                            <div class="empty-state">
                                <i class="bi bi-inbox"></i>
                                <h4>No Products Found</h4>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    @if ($products->lastPage() > 1)
    <div class="pagination-wrapper">
        @for ($i = 1; $i <= $products->lastPage(); $i++)
            <a href="{{ $products->url($i) }}"
                class="page-number {{ $products->currentPage() == $i ? 'active-page' : '' }}">
                {{ $i }}
            </a>
        @endfor
    </div>
    @endif

@endsection
