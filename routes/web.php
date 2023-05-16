<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductColorController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/adduser', function () {
    return view('staff.create');
});


// Sales route
Route::get('/sales', function () {
    return view('dashboard.sales');
});

Route::get('/addsales', function () {
    $products = Product::with('productColors.color', 'productColors.size')
        ->orderBy('created_at', 'desc')->get();
    $totalProductsSum = $products->sum('price');
    return view('dashboard.createsales')
        ->with('products', $products)
        ->with('totalProductsSum', $totalProductsSum);
});

//returns route
Route::get('/returns', function () {
    return view('dashboard.returns');
});

Route::get('/addreturns', function () {
    $products = Product::with('productColors.color', 'productColors.size')
        ->orderBy('created_at', 'desc')->get();
    $totalProductsSum = $products->sum('price');
    return view('dashboard.createreturn')
        ->with('products', $products)
        ->with('totalProductsSum', $totalProductsSum);
});


//staff route
Route::get('/adduser', function () {
    return view('staff.create');
});
Route::get('/staff', [UserController::class, 'index'])->name('staff');
Route::get('/staff/create', [UserController::class, 'create'])->name('staff.create');
Route::post('/staff', [UserController::class, 'store'])->name('staff.store');
Route::get('/staff/edit', [ProfileController::class, 'edit'])->name('staff.edit');
Route::patch('/staff/edit', [ProfileController::class, 'update'])->name('staff.update');
Route::delete('/staff/edit', [ProfileController::class, 'destroy'])->name('staff.destroy');

// products routes
Route::resource('categories', CategoryController::class);
Route::get('/addcategory', function () {
    return view('categories.create');
});

//color route
Route::resource('colors', ColorController::class);
Route::get('/addcolor', function () {
    return view('colors.create');
});


//sizes route
Route::resource('sizes', SizeController::class);
Route::get('/addsize', function () {
    return view('sizes.create');
});


//suppliers route
Route::resource('suppliers', SupplierController::class);
Route::get('/addsupplier', function () {
    return view('suppliers.create');
});

//customers route
Route::resource('customers', CustomerController::class);
Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');


//purchases route
Route::resource('purchases', PurchaseController::class);
Route::get('/purchases/create', [PurchaseController::class, 'create'])->name('purchases.create');


//products route
Route::resource('products', ProductController::class);
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
