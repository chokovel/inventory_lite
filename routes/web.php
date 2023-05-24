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
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Expense;
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
Route::get('/home', function () {
    return view('home');
});

//stock report
Route::get('/stockreport', function () {
    $stockLogs = StockLog::orderBy('created_at', 'DESC')->get();
    return view('dashboard.stockreport')->with('stockLogs', $stockLogs);
});

Route::post('/stockreportsearch', function (Request $request) {
    $searchNamePhone = $request->input('searchNamePhone');
    $startDate = $request->input('startDate');
    $endDate = $request->input('endDate');

    $query = StockLog::query();

    if ($searchNamePhone) {
        $query->where(function ($q) use ($searchNamePhone) {
            $q->whereHas('product', function ($subQuery) use ($searchNamePhone) {
                $subQuery->where('product_name', 'like', '%' . $searchNamePhone . '%');
            });
        });
    }

    if ($startDate && $endDate) {
        $query->whereBetween('created_at', [$startDate, $endDate]);
    }

    $results = $query->get();

    return view('dashboard.stockreportsearch', compact('results'));
})->name('stockreport.search');



//sales report
Route::get('/salesreport', function () {
    return view('dashboard.salesreport');
});

Route::post('/salesreportsearch', function (Request $request) {
    $searchNamePhone = $request->input('searchNamePhone');
    $startDate = $request->input('startDate');
    $endDate = $request->input('endDate');

    $query = Product::query();

    if ($searchNamePhone) {
        $query->where(function ($q) use ($searchNamePhone) {
            $q->whereHas('productColors', function ($subQuery) use ($searchNamePhone) {
                $subQuery->where('product_name', 'like', '%' . $searchNamePhone . '%');
            });
        });
    }

    if ($startDate && $endDate) {
        $query->whereBetween('created_at', [$startDate, $endDate]);
    }

    $results = $query->get();

    return view('dashboard.salesreportsearch', compact('results'));
})->name('salesreport.search');

Route::prefix('returns')->group(function () {
    Route::get('/', [ProductReturnController::class, 'index'])->name('returns.list');
    Route::get("/{id}", [])->name('returns.view');
    Route::post('/{salesId}', [ProductReturnController::class, 'store'])->name('returns.save');
    Route::get("/sales/{salesId}", [ProductReturnController::class, 'salesReturn'])->name('returns.sales');
});

Route::prefix('report')->group(function () {
    Route::get('/sales', [ProductController::class, 'report'])->name('report.sales');
});

// Sales route
Route::get('/sales', [SaleCartController::class, 'index'])->name('sales');


Route::post("/sales/cart", [SaleCartController::class, 'setSession']);

Route::post("/returns/cart", [SaleCartController::class, 'returnSessionSet']);

Route::delete('/sales/clear', function () {
        session()->remove('items');
        return back()->with('message', 'Cat is now empty');
    })->name('sales.clear');

Route::get('/addsales', function (Request $request) {
    $products = [];
    if ($request->search) {
        $search = strtolower($request->search);
        $products = Product::with('productColors.color', 'productColors.size')
            ->where('product_name', 'like', '%' . $search . '%')
            ->orderBy('created_at', 'desc')
            ->get();
    } else {
        $products = Product::with('productColors.color', 'productColors.size')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    if (!count($products)) {
        $products = Product::with('productColors.color', 'productColors.size')
            ->orderBy('created_at', 'desc')
            ->get();
    }
    $totalProductsSum = 0;
    if (session()->has('items')) {
        $sessionProducts = session('items');
        foreach ($sessionProducts as $sessionProduct) {
            $sessionProduct != null ?
                $totalProductsSum = $totalProductsSum + $sessionProduct['amount'] : $totalProductsSum;
        }
    }
    return view('dashboard.createsales')
        ->with('products', $products)
        ->with('totalProductsSum', $totalProductsSum);
});

Route::post('/addsales', [SaleCartController::class, 'store'])->name('addToCart');

//returns route

Route::post("/addreturns", [SaleCartController::class, 'returnStore'])
    ->name('return.store');

Route::get('/addreturns', function (Request $request) {
    $products = [];
    if ($request->search) {
        $search = strtolower($request->search);
        $products = Product::with('productColors.color', 'productColors.size')
            ->where('product_name', 'like', '%' . $search . '%')
            ->orderBy('created_at', 'desc')
            ->get();
    } else {
        $products = Product::with('productColors.color', 'productColors.size')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    if (!count($products)) {
        $products = Product::with('productColors.color', 'productColors.size')
            ->orderBy('created_at', 'desc')
            ->get();
    }
    $totalProductsSum = 0;
    if (session()->has('return_items')) {
        $sessionProducts = session('return_items');
        foreach ($sessionProducts as $sessionProduct) {
            $sessionProduct != null ?
                $totalProductsSum = $totalProductsSum + $sessionProduct['amount'] : $totalProductsSum;
        }
    }

    return view('dashboard.createreturn')
        ->with('products', $products)
        ->with('totalProductsSum', $totalProductsSum);
});


Route::get('/layouts/homehead', [UserController::class, 'showProfile'])->name('user');

Route::get('/staff', [UserController::class, 'index'])->name('staff.index');
Route::get('/staff/create', [UserController::class, 'create'])->name('staff.create');
Route::post('/staff', [UserController::class, 'store'])->name('staff.store');
Route::get('/staff/{id}/edit', [UserController::class, 'edit'])->name('staff.edit');
Route::put('/staff/{user}', [UserController::class, 'update'])->name('staff.update');
Route::delete('/staff/{user}', [UserController::class, 'destroy'])->name('staff.destroy');

// Category routes
Route::resource('categories', CategoryController::class);
Route::get('/addcategory', function () {
    return view('categories.create');
});

// ExpenseCategory routes
Route::resource('expensecategories', ExpenseCategoryController::class);
Route::get('/addexpensecategory', function () {
    return view('expensecategories.create');
});

// Expense routes
Route::resource('expenses', ExpenseController::class);
Route::get('/expenses/create', [ExpenseController::class, 'create'])->name('expenses.create');

// Route::post('/expenses/search', function (Request $request) {
//     $searchName = $request->input('searchNamePhone');
//     $startDate = $request->input('startDate');
//     $endDate = $request->input('endDate');

//     $query = Expense::query();

//     if ($searchName) {
//         $query->where('expense_title', 'like', '%' . $searchName . '%');
//     }

//     if ($startDate && $endDate) {
//         $query->whereBetween('date', [$startDate, $endDate]);
//     }

//     $expenses = $query->get();

//     return view('expenses.search', compact('expenses'));
// })->name('expenses.search');

Route::post('/expenses/search', function (Request $request) {
    $searchName = $request->input('searchName');
    $startDate = $request->input('startDate');
    $endDate = $request->input('endDate');

    $query = Expense::query();

    if ($searchName) {
        $query->where(function ($q) use ($searchName) {
            $q->where('expense_title', 'like', '%' . $searchName . '%')
              ->orWhereHas('expenseCategory', function ($subQuery) use ($searchName) {
                $subQuery->where('name', 'like', '%' . $searchName . '%');
            });
        });
    }

    if ($startDate && $endDate) {
        $query->whereBetween('date', [$startDate, $endDate]);
    }

    $results = $query->get();

    return view('expenses.search', compact('results'));
})->name('expenses.search');


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
Route::post('/purchases/search', function (Request $request) {
    $searchName = $request->input('searchName');
    $startDate = $request->input('startDate');
    $endDate = $request->input('endDate');

    $query = Purchase::query();

     if ($searchName) {
        $query->where(function ($q) use ($searchName) {
            $q->where('product_name', 'like', '%' . $searchName . '%')
              ->orWhereHas('supplier', function ($subQuery) use ($searchName) {
                $subQuery->where('name', 'like', '%' . $searchName . '%');
            });
        });
    }

    if ($startDate && $endDate) {
        $query->whereBetween('date', [$startDate, $endDate]);
    }

    $results = $query->get();

    return view('purchases.search', compact('results'));
})->name('purchases.search');


//products route
Route::resource('products', ProductController::class);
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
// Edit Product
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
// Update Product
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::post('/products/search', [ProductController::class, 'search'])->name('products.search');




require __DIR__ . '/auth.php';
