<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductColorController;
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
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/adduser', function () {
    return view('users.staff.adduser');
});
Route::get('/staff', function () {
    return view('users.staff');
});
Route::get('/manager', function () {
    return view('users.manager');
});
Route::get('/staff', function () {
    return view('users.customer');
});
Route::get('/sales', function () {
    return view('dashboard.sales');
});
Route::get('/returns', function () {
    return view('dashboard.returns');
});


// products routes

Route::resource('categories', CategoryController::class);
Route::get('/addcategory', function() {
    return view('categories.create');
});

Route::resource('colors', ColorController::class);
Route::get('/addcolor', function() {
    return view('colors.create');
});

Route::resource('sizes', SizeController::class);
Route::get('/addsize', function() {
    return view('sizes.create');
});

Route::resource('suppliers', SupplierController::class);
Route::get('/addsupplier', function() {
    return view('suppliers.create');
});

Route::resource('purchases', PurchaseController::class);
Route::get('/purchases', [PurchaseController::class, 'index'])->name('purchases.index');
// Route::get('/addpurchase', function() {
//     return view('purchases.create');
// });
// Route::get('/purchases/create', [PurchaseController::class, 'create'])->name('purchases.create');

Route::resource('products', ProductController::class);
// Route::get('/addproduct', function() {
//     return view('products.create');
// });

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

require __DIR__.'/auth.php';
