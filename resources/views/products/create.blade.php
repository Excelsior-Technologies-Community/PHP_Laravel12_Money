<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Add Product</title>

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
            min-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            color: white;
        }

        .page-wrapper {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 15px;
        }

        .form-card {
            width: 100%;
            max-width: 520px;
            background: #0f172a;
            border: 1px solid #1e293b;
            border-radius: 22px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.35);
        }

        .form-title {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 8px;
            text-align: center;
            color: white;
        }

        .form-subtitle {
            text-align: center;
            color: #94a3b8;
            margin-bottom: 35px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-label {
            display: block;
            margin-bottom: 10px;
            color: #cbd5e1;
            font-weight: 600;
            font-size: 15px;
        }

        .form-control,
        .form-select {
            background: #111827 !important;
            border: 1px solid #1e293b !important;
            color: white !important;
            border-radius: 14px;
            padding: 14px 16px;
            font-size: 15px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #2563eb !important;
            box-shadow: none !important;
            background: #111827 !important;
            color: white !important;
        }

        .form-control::placeholder {
            color: #64748b;
        }

        .submit-btn {
            width: 100%;
            border: none;
            background: #2563eb;
            color: white;
            padding: 14px;
            border-radius: 14px;
            font-size: 16px;
            font-weight: 600;
            transition: 0.3s;
        }

        .submit-btn:hover {
            background: #1d4ed8;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            color: #94a3b8;
            margin-bottom: 25px;
            transition: 0.3s;
        }

        .back-btn:hover {
            color: white;
        }

        .icon-box {
            width: 70px;
            height: 70px;
            border-radius: 20px;
            background: #2563eb;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 20px;
            font-size: 30px;
            color: white;
        }
    </style>

</head>

<body>

    <div class="page-wrapper">

        <div class="form-card">

            <a href="{{ route('products.index') }}"
                class="back-btn">

                <i class="bi bi-arrow-left"></i>
                Back to Dashboard

            </a>

            <div class="icon-box">
                <i class="bi bi-bag-plus"></i>
            </div>

            <h2 class="form-title">
                Add Product
            </h2>

            <p class="form-subtitle">
                Create a new product with money details
            </p>

            <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">

                @csrf

                <div class="form-group">

                    <label class="form-label">
                        Product Name
                    </label>

                    <input type="text"
                        name="name"
                        class="form-control"
                        placeholder="Enter product name"
                        required>

                </div>

                <div class="form-group">

                    <label class="form-label">
                        Category
                    </label>

                    <select name="category"
                        class="form-select"
                        required>

                        <option value="">
                            Select Category
                        </option>

                        <option value="Electronics">
                            Electronics
                        </option>

                        <option value="Clothing">
                            Clothing
                        </option>

                        <option value="Books">
                            Books
                        </option>

                        <option value="Food">
                            Food
                        </option>

                    </select>

                </div>

                <div class="form-group">

                    <label class="form-label">
                        Product Price
                    </label>

                    <input type="number"
                        name="price"
                        class="form-control"
                        placeholder="Enter product price"
                        required>

                </div>

                <div class="form-group">

                    <label class="form-label">
                        Currency
                    </label>

                    <select name="currency"
                        class="form-select"
                        required>

                        <option value="INR">
                            INR (₹)
                        </option>

                        <option value="USD">
                            USD ($)
                        </option>

                        <option value="EUR">
                            EUR (€)
                        </option>

                    </select>

                </div>

                <div class="form-group">

                    <label class="form-label">
                        Product Image
                    </label>

                    <input type="file"
                        name="image"
                        class="form-control">

                </div>

                <button type="submit"
                    class="submit-btn">

                    <i class="bi bi-check-circle"></i>
                    Save Product

                </button>

            </form>

        </div>

    </div>

</body>

</html>