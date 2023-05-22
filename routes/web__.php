<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductColorController;
use App\Http\Controllers\ProductReturnController;
use App\Http\Controllers\SaleCartController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductReturn;
use App\Models\SaleCart;
use App\Models\StockLog;
use Illuminate\Http\Request;
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

require __DIR__ . '/auth.php';

Route::middleware(['role:admin'])->group(function () {
    // Routes accessible by admin
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    // Stock Report
    Route::get('/stockreport', function () {
        $stockLogs = StockLog::get();
        return view('dashboard.stockreport')->with('stockLogs', $stockLogs);
    })->name('stockreport');

    // Sales Report
    Route::get('/salesreport', function () {
        return view('dashboard.salesreport');
    })->name('salesreport');

    // Returns
    Route::prefix('returns')->group(function () {
        Route::get('/', [ProductReturnController::class, 'index'])->name('returns.list');
        Route::get("/{id}", [])->name('returns.view');
        Route::post('/{salesId}', [ProductReturnController::class, 'store'])->name('returns.save');
        Route::get("/sales/{salesId}", [ProductReturnController::class, 'salesReturn'])->name('returns.sales');
    });

    // Report
    Route::prefix('report')->group(function () {
        Route::get('/sales', [ProductController::class, 'report'])->name('report.sales');
    });

    // Sales
    Route::get('/sales', [SaleCartController::class, 'index'])->name('sales');
    Route::post("/sales/cart", [SaleCartController::class, 'setSession']);
    Route::post("/returns/cart", [SaleCartController::class, 'returnSessionSet']);
    Route::delete('/sales/clear', function () {
        session()->remove('items');
        return back()->with('message', 'Cart is now empty');
    })->name('sales.clear');
    Route::get('/addsales', function (Request $request) {
        // Add Sales Logic
    });

    Route::post('/addsales', [SaleCartController::class, 'store'])->name('addToCart');

    // Returns
    Route::post("/addreturns", [SaleCartController::class, 'returnStore'])
        ->name('return.store');

    Route::get('/addreturns', function (Request $request) {
        // Add Returns Logic
    });

    // User
    Route::get('/layouts/homehead', [UserController::class, 'showProfile'])->name('user');

    // Staff
    Route::get('/staff', [UserController::class, 'index'])->name('staff.index');
    Route::get('/staff/create', [UserController::class, 'create'])->name('staff.create');
    Route::post('/staff', [UserController::class, 'store'])->name('staff.store');
    Route::get('/staff/{id}/edit', [UserController::class, 'edit'])->name('staff.edit');
    Route::put('/staff/{user}', [UserController::class, 'update'])->name('staff.update');
    Route::delete('/staff/{user}', [UserController::class, 'destroy'])->name('staff.destroy');

    // Category
    Route::resource('categories', CategoryController::class);
    Route::get('/addcategory', function () {
        return view('categories.create');
    });

    // Expense Category
    Route::resource('expensecategories', ExpenseCategoryController::class);
    Route::get('/addexpensecategory', function () {
        return view('expensecategories.create');
    });

    // Expense
    Route::resource('expenses', ExpenseController::class);
    Route::get('/expenses/create', [ExpenseController::class, 'create'])->name('expenses.create');

    // Color
    Route::resource('colors', ColorController::class);
    Route::get('/addcolor', function () {
        return view('colors.create');
    });

    // Size
    Route::resource('sizes', SizeController::class);
    Route::get('/addsize', function () {
        return view('sizes.create');
    });

    // Supplier
    Route::resource('suppliers', SupplierController::class);
    Route::get('/addsupplier', function () {
        return view('suppliers.create');
    });

    // Customer
    Route::resource('customers', CustomerController::class);
    Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');

    // Purchase
    Route::resource('purchases', PurchaseController::class);
    Route::get('/purchases/create', [PurchaseController::class, 'create'])->name('purchases.create');

    // Product
    Route::resource('products', ProductController::class);
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{id}/edit', 'ProductController@edit')->name('products.edit');
    Route::put('/products/{id}', 'ProductController@update')->name('products.update');
});
