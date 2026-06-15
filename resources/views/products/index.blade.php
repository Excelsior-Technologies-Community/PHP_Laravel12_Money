<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Money Dashboard</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"
        rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #020617;
            color: white;
            font-family: Arial, Helvetica, sans-serif;
            min-height: 100vh;
        }

        .container-box {
            padding: 40px 0;
        }

        /* Header */

        .dashboard-title {
            font-size: 34px;
            font-weight: 700;
            color: #ffffff;
        }

        .dashboard-subtitle {
            color: #94a3b8;
            margin-top: 5px;
        }

        .btn-add {
            background: #2563eb;
            color: white;
            padding: 12px 22px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-add:hover {
            background: #1d4ed8;
            color: white;
        }

        /* Cards */

        .stats-card {
            background: #0f172a;
            border: 1px solid #1e293b;
            border-radius: 18px;
            padding: 28px;
            transition: 0.3s;
        }

        .stats-card:hover {
            transform: translateY(-4px);
            border-color: #2563eb;
        }

        .stats-icon {
            width: 60px;
            height: 60px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            margin-bottom: 18px;
        }

        .bg-blue {
            background: #2563eb;
        }

        .bg-green {
            background: #16a34a;
        }

        .stats-title {
            color: #94a3b8;
            font-size: 15px;
        }

        .stats-value {
            font-size: 32px;
            font-weight: 700;
            margin-top: 6px;
        }

        /* Search */

        .search-box {
            background: #0f172a !important;
            border: 1px solid #1e293b !important;
            color: white !important;
            border-radius: 14px;
            padding: 14px;
        }

        .search-box::placeholder {
            color: #64748b;
        }

        .search-box:focus {
            border-color: #2563eb !important;
            box-shadow: none !important;
        }

        /* Table */

        .table-card {
            background: #0f172a;
            border: 1px solid #1e293b;
            border-radius: 18px;
            overflow: hidden;
        }

        .table {
            margin-bottom: 0;
            color: white !important;
        }

        .table thead {
            background: #111827 !important;
        }

        .table thead th {
            background: #111827 !important;
            color: #cbd5e1 !important;
            border: none !important;
            padding: 18px;
            text-transform: uppercase;
            font-size: 14px;
        }

        .table tbody tr {
            background: #0f172a !important;
            transition: 0.3s;
        }

        .table tbody tr:hover {
            background: #111827 !important;
        }

        .table tbody td {
            background: #0f172a !important;
            color: white !important;
            border-color: #1e293b !important;
            padding: 18px;
            vertical-align: middle;
        }

        .product-name {
            font-weight: 600;
        }

        .price {
            color: #38bdf8;
            font-weight: 700;
        }

        .currency-badge {
            background: #1e293b;
            color: #38bdf8;
            padding: 8px 14px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 600;
        }

        

        /* Buttons */

        .btn-edit {
            background: #f59e0b;
            border: none;
            color: white;
            border-radius: 10px;
            padding: 8px 12px;
        }

        .btn-delete {
            background: #dc2626;
            border: none;
            color: white;
            border-radius: 10px;
            padding: 8px 12px;
        }

        .btn-edit:hover {
            background: #d97706;
            color: white;
        }

        .btn-delete:hover {
            background: #b91c1c;
            color: white;
        }

        /* Alert */

        .alert-success {
            background: #052e16;
            border: none;
            color: #bbf7d0;
            border-radius: 12px;
        }

        /* Empty */

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #94a3b8;
        }

        .empty-state i {
            font-size: 70px;
            margin-bottom: 18px;
        }

        /* Custom Pagination */

        .pagination-wrapper {
            display: flex;
            justify-content: center;
            margin-top: 35px;
        }

        .page-number {
            width: 45px;
            height: 45px;
            background: #111827;
            color: white;
            border-radius: 12px;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 6px;
            font-weight: 600;
            transition: 0.3s;
            border: 1px solid #1e293b;
        }

        .page-number:hover {
            background: #2563eb;
            color: white;
        }

        .active-page {
            background: #2563eb;
            color: white;
            border-color: #2563eb;
        }

        .filter-btn {
            height: 54px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            font-weight: 600;
        }

        .form-label {
            color: #cbd5e1;
            font-size: 14px;
            font-weight: 600;
        }
    </style>

</head>

<body>

    <div class="container container-box">

        <!-- Header -->

        <div class="d-flex justify-content-between align-items-center mb-5">

            <div>

                <h1 class="dashboard-title">
                    <i class="bi bi-cash-stack"></i>
                    Money Dashboard
                </h1>

                <p class="dashboard-subtitle">
                    Manage products and money records
                </p>

            </div>

            <a href="{{ route('products.create') }}"
                class="btn-add">

                <i class="bi bi-plus-circle"></i>
                Add Product

            </a>

        </div>

        <!-- Success Message -->

        @if(session('success'))

        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>

        @endif

        <!-- Stats -->

        <div class="row g-4 mb-4">

            <div class="col-md-6">

                <div class="stats-card">

                    <div class="stats-icon bg-blue">
                        <i class="bi bi-box-seam"></i>
                    </div>

                    <div class="stats-title">
                        Total Products
                    </div>

                    <div class="stats-value">
                        {{ $totalProducts }}
                    </div>

                </div>

            </div>

            <div class="col-md-6">

                <div class="stats-card">

                    <div class="stats-icon bg-green">
                        <i class="bi bi-currency-rupee"></i>
                    </div>

                    <div class="stats-title">
                        Total Amount
                    </div>

                    <div class="stats-value">
                        ₹ {{ number_format($totalAmount, 2) }}
                    </div>

                </div>

            </div>

        </div>

        <!-- Search -->

        <!-- Search + Filter -->

        <form method="GET" class="row g-3 align-items-end mb-4">

            <div class="col-lg-4 col-md-12">

                <label class="form-label text-light mb-2">
                    Search Product
                </label>

                <input type="text"
                    name="search"
                    class="form-control search-box"
                    placeholder="Search by Name, Category, Currency or Price"
                    value="{{ request('search') }}">

            </div>

            <div class="col-lg-3 col-md-6">

                <label class="form-label text-light mb-2">
                    Category
                </label>

                <select name="category"
                    class="form-select search-box">

                    <option value="">All Categories</option>

                    <option value="Electronics"
                        {{ request('category') == 'Electronics' ? 'selected' : '' }}>
                        Electronics
                    </option>

                    <option value="Clothing"
                        {{ request('category') == 'Clothing' ? 'selected' : '' }}>
                        Clothing
                    </option>

                    <option value="Books"
                        {{ request('category') == 'Books' ? 'selected' : '' }}>
                        Books
                    </option>

                    <option value="Food"
                        {{ request('category') == 'Food' ? 'selected' : '' }}>
                        Food
                    </option>

                </select>

            </div>

            <div class="col-lg-3 col-md-6">

                <label class="form-label text-light mb-2">
                    Currency
                </label>

                <select name="currency"
                    class="form-select search-box">

                    <option value="">All Currency</option>

                    <option value="INR"
                        {{ request('currency') == 'INR' ? 'selected' : '' }}>
                        INR
                    </option>

                    <option value="USD"
                        {{ request('currency') == 'USD' ? 'selected' : '' }}>
                        USD
                    </option>

                    <option value="EUR"
                        {{ request('currency') == 'EUR' ? 'selected' : '' }}>
                        EUR
                    </option>

                </select>

            </div>

            <div class="col-lg-2 col-md-12">

                <div class="d-flex gap-2">

                    <button type="submit"
                        class="btn btn-primary flex-fill filter-btn">

                        <i class="bi bi-funnel-fill"></i>

                    </button>

                    <a href="{{ route('products.index') }}"
                        class="btn btn-secondary flex-fill filter-btn">

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
                            <th width="180">Action</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($products as $product)

                        <tr>

                            <td>#{{ $product->id }}</td>

                            <td class="product-name">
                                {{ $product->name }}
                            </td>

                            <td>
                                <span class="badge bg-primary">
                                    {{ $product->category }}
                                </span>
                            </td>

                            <td class="price">
                                {{ $product->formatted_price }}
                            </td>

                            <td>

                                <span class="currency-badge">
                                    {{ $product->currency }}
                                </span>

                            </td>

                            <td>

                                @if($product->image)

                                <img src="{{ asset('storage/'.$product->image) }}"
                                    width="100"
                                    height="80"
                                    style="object-fit:contain;border-radius:10px;">

                                @else

                                <span class="text-secondary">
                                    No Image
                                </span>

                                @endif

                            </td>

                            <td>

                                <a href="{{ route('products.edit', $product->id) }}"
                                    class="btn btn-edit btn-sm">

                                    <i class="bi bi-pencil-square"></i>

                                </a>

                                <form action="{{ route('products.destroy', $product->id) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="btn btn-delete btn-sm"
                                        onclick="return confirm('Delete Product?')">

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

        <!-- Custom Number Pagination -->

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

    </div>

</body>

</html>