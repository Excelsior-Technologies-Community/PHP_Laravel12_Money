<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Money Dashboard')</title>

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
            color: #e2e8f0;
            font-family: 'Segoe UI', Arial, Helvetica, sans-serif;
            min-height: 100vh;
        }

        /* Navbar */
        .app-navbar {
            background: #0f172a;
            border-bottom: 1px solid #1e293b;
            padding: 16px 28px;
        }

        .app-brand {
            color: #fff;
            font-size: 22px;
            font-weight: 700;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .app-brand i {
            color: #38bdf8;
            font-size: 26px;
        }

        .app-nav-link {
            color: #94a3b8;
            text-decoration: none;
            font-weight: 600;
            margin-left: 22px;
            transition: 0.3s;
        }

        .app-nav-link:hover,
        .app-nav-link.active {
            color: #fff;
        }

        .app-nav-link.btn-add-nav {
            background: #2563eb;
            color: #fff;
            padding: 9px 18px;
            border-radius: 12px;
            margin-left: 22px;
        }

        .app-nav-link.btn-add-nav:hover {
            background: #1d4ed8;
            color: #fff;
        }

        .main-container {
            padding: 40px 28px;
            max-width: 1100px;
            margin: 0 auto;
        }

        .page-title {
            font-size: 30px;
            font-weight: 700;
            color: #fff;
        }

        .page-subtitle {
            color: #94a3b8;
            margin-top: 4px;
            margin-bottom: 26px;
        }

        /* Cards */
        .card-dark {
            background: #0f172a;
            border: 1px solid #1e293b;
            border-radius: 18px;
        }

        .stats-card {
            background: #0f172a;
            border: 1px solid #1e293b;
            border-radius: 18px;
            padding: 26px;
            transition: 0.3s;
            height: 100%;
        }

        .stats-card:hover {
            transform: translateY(-4px);
            border-color: #2563eb;
        }

        .stats-icon {
            width: 56px;
            height: 56px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 22px;
            margin-bottom: 16px;
        }

        .bg-blue { background: #2563eb; }
        .bg-green { background: #16a34a; }

        .stats-title {
            color: #94a3b8;
            font-size: 14px;
        }

        .stats-value {
            font-size: 28px;
            font-weight: 700;
            margin-top: 4px;
            color: #fff;
        }

        /* Forms */
        .form-card {
            max-width: 560px;
            margin: 0 auto;
            background: #0f172a;
            border: 1px solid #1e293b;
            border-radius: 22px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.35);
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            color: #cbd5e1;
            font-weight: 600;
            font-size: 14px;
        }

        .form-control,
        .form-select {
            background: #111827 !important;
            border: 1px solid #1e293b !important;
            color: #fff !important;
            border-radius: 12px;
            padding: 12px 14px;
            font-size: 15px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #2563eb !important;
            box-shadow: none !important;
        }

        .form-control::placeholder { color: #64748b; }

        .submit-btn {
            width: 100%;
            border: none;
            background: #2563eb;
            color: #fff;
            padding: 14px;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            transition: 0.3s;
        }

        .submit-btn:hover { background: #1d4ed8; }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            color: #94a3b8;
            margin-bottom: 22px;
            transition: 0.3s;
        }

        .back-btn:hover { color: #fff; }

        .icon-box {
            width: 70px;
            height: 70px;
            border-radius: 20px;
            background: #2563eb;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 18px;
            font-size: 30px;
            color: #fff;
        }

        .icon-box.amber { background: #f59e0b; }
        .icon-box.cyan { background: #0891b2; }

        /* Table */
        .table-card {
            background: #0f172a;
            border: 1px solid #1e293b;
            border-radius: 18px;
            overflow: hidden;
        }

        .table { margin-bottom: 0; color: #fff !important; }

        .table thead th {
            background: #111827 !important;
            color: #cbd5e1 !important;
            border: none !important;
            padding: 16px;
            text-transform: uppercase;
            font-size: 13px;
        }

        .table tbody tr { transition: 0.3s; }

        .table tbody tr:hover { background: #111827 !important; }

        .table tbody td {
            background: #0f172a !important;
            color: #fff !important;
            border-color: #1e293b !important;
            padding: 16px;
            vertical-align: middle;
        }

        .product-name { font-weight: 600; }
        .price { color: #38bdf8; font-weight: 700; }

        .currency-badge {
            background: #1e293b;
            color: #38bdf8;
            padding: 6px 12px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 600;
        }

        .btn-edit { background: #f59e0b; border: none; color: #fff; border-radius: 10px; padding: 8px 12px; }
        .btn-delete { background: #dc2626; border: none; color: #fff; border-radius: 10px; padding: 8px 12px; }
        .btn-view { background: #0891b2; border: none; color: #fff; border-radius: 10px; padding: 8px 12px; }

        .btn-edit:hover { background: #d97706; color: #fff; }
        .btn-delete:hover { background: #b91c1c; color: #fff; }
        .btn-view:hover { background: #0e7490; color: #fff; }

        /* Search */
        .search-box {
            background: #111827 !important;
            border: 1px solid #1e293b !important;
            color: #fff !important;
            border-radius: 12px;
            padding: 12px 14px;
        }

        .search-box::placeholder { color: #64748b; }
        .search-box:focus { border-color: #2563eb !important; box-shadow: none !important; }

        /* Pagination */
        .pagination-wrapper {
            display: flex;
            justify-content: center;
            margin-top: 30px;
            flex-wrap: wrap;
            gap: 8px;
        }

        .page-number {
            min-width: 42px;
            height: 42px;
            background: #111827;
            color: #fff;
            border-radius: 12px;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            border: 1px solid #1e293b;
            padding: 0 12px;
        }

        .page-number:hover { background: #2563eb; color: #fff; }
        .active-page { background: #2563eb; color: #fff; border-color: #2563eb; }

        /* Empty */
        .empty-state { text-align: center; padding: 60px 20px; color: #94a3b8; }
        .empty-state i { font-size: 64px; margin-bottom: 16px; }

        /* Detail */
        .detail-card {
            max-width: 640px;
            margin: 0 auto;
            background: #0f172a;
            border: 1px solid #1e293b;
            border-radius: 22px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.35);
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 14px 0;
            border-bottom: 1px solid #1e293b;
        }

        .info-label { color: #94a3b8; font-weight: 600; }
        .info-value { color: #fff; font-weight: 600; }

        .conversion-box {
            background: #111827;
            border: 1px solid #1e293b;
            border-radius: 16px;
            padding: 20px;
            margin-top: 22px;
        }

        .conversion-title {
            color: #cbd5e1;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 14px;
            text-transform: uppercase;
        }

        .conversion-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            color: #e2e8f0;
        }

        .product-img {
            width: 100%;
            max-height: 280px;
            object-fit: contain;
            border-radius: 14px;
            background: #111827;
            padding: 12px;
        }

        .action-row { display: flex; gap: 12px; margin-top: 28px; }

        .btn-action {
            flex: 1;
            border: none;
            border-radius: 12px;
            padding: 12px;
            font-weight: 600;
            text-decoration: none;
            text-align: center;
            transition: 0.3s;
        }

        .btn-action-edit { background: #f59e0b; color: #fff; }
        .btn-action-edit:hover { background: #d97706; color: #fff; }
        .btn-action-delete { background: #dc2626; color: #fff; }
        .btn-action-delete:hover { background: #b91c1c; color: #fff; }
    </style>

</head>

<body>

    <!-- Navbar -->
    <nav class="app-navbar d-flex justify-content-between align-items-center">
        <a href="{{ route('products.index') }}"
            class="app-brand">
            <i class="bi bi-cash-stack"></i> Money Dashboard
        </a>

        <div class="d-flex align-items-center">
            <a href="{{ route('products.index') }}"
                class="app-nav-link {{ request()->routeIs('products.index') ? 'active' : '' }}">
                Products
            </a>

            <a href="{{ route('products.create') }}"
                class="app-nav-link btn-add-nav">
                <i class="bi bi-plus-circle"></i> Add Product
            </a>
        </div>
    </nav>

    <div class="main-container">
        @yield('content')
    </div>

    <!-- Success Toast -->
    @if(session('success'))
    <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1080;">
        <div id="successToast"
            class="toast align-items-center text-bg-success border-0 show"
            role="alert"
            aria-live="assertive"
            aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="bi bi-check-circle me-2"></i>
                    {{ session('success') }}
                </div>
                <button type="button"
                    class="btn-close btn-close-white me-2 m-auto"
                    data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>
    @endif

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toastEl = document.getElementById('successToast');
            if (toastEl) {
                const toast = new bootstrap.Toast(toastEl, { delay: 3000 });
                toast.show();
            }
        });
    </script>

</body>

</html>
