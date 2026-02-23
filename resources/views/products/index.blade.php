<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product List</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 60px auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        h2 {
            margin: 0;
            color: #333;
        }

        .add-btn {
            text-decoration: none;
            padding: 10px 16px;
            background: #4f46e5;
            color: #fff;
            border-radius: 6px;
            font-weight: 600;
            transition: background 0.3s ease;
        }

        .add-btn:hover {
            background: #4338ca;
        }

        .success {
            background: #ecfdf5;
            color: #065f46;
            padding: 10px 14px;
            border-radius: 6px;
            margin-bottom: 15px;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #f1f5f9;
        }

        th, td {
            padding: 12px 14px;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }

        th {
            font-weight: 600;
            color: #374151;
        }

        tr:hover td {
            background: #f9fafb;
        }

        .price {
            font-weight: 600;
            color: #111827;
        }

        .empty {
            text-align: center;
            color: #6b7280;
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="container">

    <div class="header">
        <h2>Product List</h2>
        <a href="{{ route('products.create') }}" class="add-btn">+ Add Product</a>
    </div>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
        @forelse($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td class="price">{{ $product->formatted_price }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="2" class="empty">No products found</td>
            </tr>
        @endforelse
        </tbody>
    </table>

</div>

</body>
</html>