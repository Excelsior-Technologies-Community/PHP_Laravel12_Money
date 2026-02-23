# PHP_Laravel12_Money
```php
- Laravel 12 based project demonstrating proper Money & Currency handling
using Laravel Money package with Blade based Browser UI
```
# Step 1: Install Laravel 12 – Create Project
```php
We create a fresh Laravel 12 project to demonstrate money & currency handling.
```
Open Terminal / CMD:
```php
composer create-project laravel/laravel:^12.0 PHP_Laravel12_Money
```
Move to project folder:
```php
cd PHP_Laravel12_Money
```
Generate application key:
```php
php artisan key:generate
```
# Step 2: Setup Database (.env File)
Open .env file and configure database:
```php
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3307
DB_DATABASE=laravel12_money
DB_USERNAME=root
DB_PASSWORD=
```
Create database in MySQL / phpMyAdmin:
```php
CREATE DATABASE laravel12_money;
```
Run default migrations:
```php
php artisan migrate
```
# Explanation
```php
- Confirms database connectivity
- Default Laravel tables are created successfully
- Project is now ready for custom tables
```
# Step 3: Install Laravel Money Package
```php
composer require akaunting/laravel-money
```
Publish configuration file:
```php
php artisan vendor:publish --tag=money-config
```
# Explanation
```php
Laravel Money is a professional money handling library
Provides:
    Currency formatting
    Currency symbols
    Localization support
```
Config file created at:
```php
config/money.php
```
# Step 4: Create Product Model & Migration
Create model with migration:
```php
php artisan make:model Product -m
```
# Step 5: Database Migration
Path:
```php
database/migrations/xxxx_create_products_table.php
```
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->decimal('price', 10, 2);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
```
Run migration:
```php
php artisan migrate
```
# Explanation
```php
- Price stored as integer for accuracy
- Currency stored separately
- This approach is used in e-commerce & finance systems
```
# Step 6: Configure Product Model
Path:
```php
app/Models/Product.php
```
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Akaunting\Money\Money;

class Product extends Model
{
    protected $fillable = ['name', 'price'];

    public function getFormattedPriceAttribute()
    {
        return Money::INR($this->price);
    }
}
```
# Explanation
```php
- Accessor formats money automatically
- Blade remains clean
- Formatting logic stays in Model layer
```
# Step 6: Create Controller
Create controller:
```php
php artisan make:controller ProductController
```
Path:
```php
app/Http/Controllers/ProductController.php
```
```php
<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'currency' => 'required'
        ]);

        Product::create([
            'name' => $request->name,
            'price' => $request->price * 100, // cents
            'currency' => $request->currency
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully');
    }
}
```
# Step 7: Define Web Routes

Path:
```php
routes/web.php
```
```php
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::get('/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/store', [ProductController::class, 'store'])->name('products.store');
```
# Step 8: Blade UI
Blade Structure
```php
resources/views/
 └── products/
     ├── index.blade.php
     └── create.blade.php
```
Product List View
```php
Path: resources/views/products/index.blade.php
```
```php
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
```
Product Create View
```php
Path: resources/views/products/create.blade.php
```
```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 420px;
            margin: 60px auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 6px;
            color: #555;
        }

        input, select {
            width: 100%;
            padding: 10px 12px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
            outline: none;
        }

        input:focus, select:focus {
            border-color: #4f46e5;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #4f46e5;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #4338ca;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Add Product</h2>

    <form method="POST" action="{{ route('products.store') }}">
        @csrf

        <div class="form-group">
            <label>Product Name</label>
            <input type="text" name="name" placeholder="Enter product name" required>
        </div>

        <div class="form-group">
            <label>Price</label>
            <input type="number" name="price" placeholder="Enter price" required>
        </div>

        <div class="form-group">
            <label>Currency</label>
            <select name="currency" required>
                <option value="INR">INR (₹)</option>
                <option value="USD">USD ($)</option>
                <option value="EUR">EUR (€)</option>
            </select>
        </div>

        <button type="submit">Save Product</button>
    </form>
</div>

</body>
</html>
```
# Step 9: Run Laravel Project
Start server:
```php
php artisan serve
```
Open browser:
Product List
```php
http://127.0.0.1:8000
```
<img width="1284" height="635" alt="image" src="https://github.com/user-attachments/assets/f2c8434e-ecda-4bfe-ab87-133da48a7f21" />
Create Product
```php
http://127.0.0.1:8000/create
```

<img width="1278" height="675" alt="image" src="https://github.com/user-attachments/assets/8f2dd7fe-60df-47ae-9d00-a9d1d3bc160c" />

# Project Folder Structure
```php
PHP_Laravel12_Money
├── app
│   ├── Http
│   │   └── Controllers
│   │       └── ProductController.php
│   └── Models
│       └── Product.php
│
├── database
│   └── migrations
│       └── create_products_table.php
│
├── resources
│   └── views
│       └── products
│           ├── index.blade.php
│           └── create.blade.php
│
├── routes
│   └── web.php
│
├── .env
├── artisan
```



