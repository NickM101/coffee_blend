# ☕ CoffeeBlend

CoffeeBlend is a premium online coffee store built on the Laravel framework. It provides a user-friendly platform for coffee lovers to explore and purchase a diverse selection of high-quality coffee blends. Customers can conveniently browse our extensive collection, read detailed product descriptions, and place orders directly from their homes. Our platform offers a seamless shopping experience, secure payment options, and fast shipping to ensure customer satisfaction.
## 🚀 Getting Started

### Prerequisites
Ensure you have the following installed:
- **PHP 8.3.12** (`php -v`)
- **Composer 2.8.3** (`composer -V`)
- **Laravel CLI 11.34.2** (`php artisan --version`)
- **MariaDB 9.0.1** (`mysql -V`)
- **Node.js 10.9.0** (`node -v`)
- **NPM 20.15.0** (`npm -v`)

## 📦 Clone the Repository

```bash  
git clone https://github.com/NickM101/coffee_blend.git
cd coffeeblend  
```

## 🔧 Setup
### 1. Install Dependencies

```bash
composer install  
npm install 
```

### 2. Set Up Environment

Copy .env.example to .env:

```bash
cp .env.example .env  
```
### 3. Generate Application Key

```bash
php artisan key:generate  
```
### 4. Database Setup

#### 1. Create the Database:
```sql
CREATE DATABASE coffeeblend; 
```

#### 2. Run Migrations:
```bash
php artisan migrate  
```

#### 3. Restore the Backup
```sql
mysql -u root -p coffeeblend < coffeeblend.sql  
```

### 5.  Start the Development Server
```bash
   php artisan serve  
   npm run dev
 ```

Now, visit http://127.0.0.1:8000 in your browser.

## 👩🏻‍💻 Technical Overview

### 1. Adding a new page
To add a new page in laravel:
#### 1.1 Create a blade view
Create a file in the `resources/views` folder.
```html
<!-- resources/views/about.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>About Us</title>
</head>
<body>
    <h1>About Us</h1>
    <p>Welcome to our Coffee Blend!</p>
</body>
</html>
```
#### 1.2 Add a Route in `web.php`
```php
// routes/web.php
Route::get('/about', function () {
    return view('about');
});
```
#### 1.3 Access the page
Visit `http://localhost/about`

### 2. Submitting Forms
#### 2.1 Create a Form in a Blade View
Use the POST method and define a route for the form action.
```html
<!-- resources/views/contact.blade.php -->
<!DOCTYPE html>
<html>
<body>
    <h1>Contact Us</h1>
    <form method="POST" action="/contact">
        <!-- Cross site request forgery -->
        <!-- @csrf protects your website from malicious attacks. -->
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
```
#### 2.2 Add a Route to Handle Form Submission
```php
// routes/web.php
Route::post('/contact', [ContactController::class, 'store']);
```
#### 2.3 Create the Controller Method
Use the command to generate a controller
```bash
php artisan make:controller ContactController
```
```php
// app/Http/Controllers/ContactController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Process the data (e.g., save to the database)
        return redirect('/thank-you')->with('success', 'Form submitted!');
    }
}
```
### 3 Reading Data from the Database
Use the command to generate a model
```bash
php artisan make:model Product
```
#### 3.1 Create the Model Method
- The `fillable` property ensures only these fields can be mass-assigned using `create()` or `update()`.
- `timestamps` is `true`, so Laravel will handle the `created_at` and `updated_at` columns automatically.
```php
// app/Models/Product/Product.php
class Product extends Model
{
    protected $table = 'products'; 
    
    protected $fillable = [
        'name',        
        'description', 
        'price',       
        'quantity',    
        'image',       
        'created_at',  
        'updated_at',  
    ];

    public $timestamps = true;
}
```
#### 3.2 Add a Route to Handle Products
```php
use App\Models\Product;

Route::get('/products', function () {
    $products = Product::all(); // Fetch all products
    return view('products', ['products' => $products]);
});
```
#### 3.3 Add a Route to Handle Products
Create a Blade view to display the product data.
```html
<!-- resources/views/products.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
</head>
<body>
    <h1>Products</h1>
    <ul>
        @foreach ($products as $product)
            <li>
                <strong>{{ $product->name }}</strong> - ${{ $product->price }}
                <p>{{ $product->description }}</p>
            </li>
        @endforeach
    </ul>
</body>
</html>
```

#### 3.4 Access the page
Visit http://localhost/products

## 🤝 Contributing
Here's how you can help:

1. **Fork the Repository**
2. **Create a Feature Branch** (`git checkout -b feature/YourFeatureName`)
3. **Commit Changes** (`git commit -m 'Add some feature'`)
4. **Push to the Branch** (`git push origin feature/YourFeatureName`)
5. **Open a Pull Request**

## 📄 License
CoffeeBlend is open-source and licensed under the [MIT License](https://opensource.org/license/mit).

## 💬 Support
For questions or support, open an issue or email us at [ebs362920@gmail.com]().
