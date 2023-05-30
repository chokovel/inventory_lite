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
use Illuminate\Support\Facades\DB;
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
})->middleware(['checkRole:admin,manager,staff']);

//stock report
Route::get('/stockreport', function () {
    $stockLogs = StockLog::orderBy('created_at', 'DESC')->get();
    return view('dashboard.stockreport')->with('stockLogs', $stockLogs);
})->middleware(['checkRole:admin,manager']);

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
})->middleware(['checkRole:admin,manager']);

// Route::get('/dashboard/salesreport', [SaleCartController::class, 'create'])->name('salesreport');

Route::post('/salesreportsearch', function (Request $request) {
    $searchNamePhone = $request->input('searchNamePhone');
    $startDate = $request->input('startDate');
    $endDate = $request->input('endDate');
    $month = $request->input('month');

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

    if ($month) {
        $query->whereMonth('created_at', $month);
    }

    $results = $query->get();

    return view('dashboard.salesreportsearch', compact('results'));
})->name('salesreport.search');

Route::prefix('returns')->group(function () {
    Route::get('/', [ProductReturnController::class, 'index'])->name('returns.list');
    Route::get("/{id}", [])->name('returns.view');
    Route::post('/{salesId}', [ProductReturnController::class, 'store'])->name('returns.save');
    Route::get("/sales/{salesId}", [ProductReturnController::class, 'salesReturn'])->name('returns.sales');
})->middleware(['checkRole:admin,manager,staff']);

//Product Return Search
Route::post('/dashboard/returnsearch', function (Request $request) {
    $searchName = $request->input('searchName');
    $startDate = $request->input('startDate');
    $endDate = $request->input('endDate');

    $query = ProductReturn::query();

    if ($searchName) {
        $query->where(function ($q) use ($searchName) {
            $q->whereHas('saleCart.customer', function ($subQuery) use ($searchName) {
                $subQuery->where('name', 'like', '%' . $searchName . '%');
            })->orWhereHas('saleCart.productColor.product', function ($subQuery) use ($searchName) {
                $subQuery->where('product_name', 'like', '%' . $searchName . '%');
            });
        });
    }

    if ($startDate && $endDate) {
        $query->whereBetween('created_at', [$startDate, $endDate]);
    }

    $results = $query->get();

    return view('dashboard.returnsearch', compact('results'));
})->name('returns.search');



Route::prefix('report')->group(function () {
    Route::get('/sales', [ProductController::class, 'report'])->name('report.sales');
})->middleware(['checkRole:admin,manager']);

// Sales route
Route::get('/sales', [SaleCartController::class, 'index'])->name('sales')->middleware(['checkRole:admin,manager,staff']);


Route::post("/sales/cart", [SaleCartController::class, 'setSession']);

Route::post("/returns/cart", [SaleCartController::class, 'returnSessionSet']);

Route::delete('/sales/clear', function () {
        session()->remove('items');
        return back()->with('message', 'Cart is now empty');
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
})->middleware(['checkRole:admin,manager,staff']);

Route::post('/addsales', [SaleCartController::class, 'store'])->name('addToCart');

Route::post('/dashboard/salesearch', function (Request $request) {
    $searchName = $request->input('searchName');
    $startDate = $request->input('startDate');
    $endDate = $request->input('endDate');

    $query = SaleCart::query();

    if ($searchName) {
        $query->where(function ($q) use ($searchName) {
            $q->whereHas('customer', function ($subQuery) use ($searchName) {
                $subQuery->where('name', 'like', '%' . $searchName . '%');
            })->orWhereHas('productColor.product', function ($subQuery) use ($searchName) {
                $subQuery->where('product_name', 'like', '%' . $searchName . '%');
            });
        });
    }

    if ($startDate && $endDate) {
        $query->whereBetween('created_at', [$startDate, $endDate]);
    }

    $results = $query->get();

    return view('dashboard.salesearch', compact('results'));
})->name('sales.search');


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
})->middleware(['checkRole:admin,manager,staff']);


Route::get('/layouts/homehead', [UserController::class, 'showProfile'])->name('user')->middleware(['checkRole:admin,manager,staff']);

Route::get('/staff', [UserController::class, 'index'])->name('staff.index')->middleware(['checkRole:admin,manager']);
Route::get('/staff/create', [UserController::class, 'create'])->name('staff.create')->middleware(['checkRole:admin,manager']);
Route::post('/staff', [UserController::class, 'store'])->name('staff.store');
Route::get('/staff/{id}/edit', [UserController::class, 'edit'])->name('staff.edit');
Route::put('/staff/{user}', [UserController::class, 'update'])->name('staff.update');
Route::delete('/staff/{user}', [UserController::class, 'destroy'])->name('staff.destroy');
Route::post('/staff.search', [UserController::class, 'search'])->name('staff.search');

// Category routes
Route::resource('categories', CategoryController::class)->middleware(['checkRole:admin,manager,staff']);
Route::get('/addcategory', function () {
    return view('categories.create');
});

// ExpenseCategory routes
Route::resource('expensecategories', ExpenseCategoryController::class)->middleware(['checkRole:admin,manager,staff']);
Route::get('/addexpensecategory', function () {
    return view('expensecategories.create');
})->middleware(['checkRole:admin,manager,staff']);

// Expense routes
Route::resource('expenses', ExpenseController::class)->middleware(['checkRole:admin,manager,staff']);
Route::get('/expenses/create', [ExpenseController::class, 'create'])->name('expenses.create')->middleware(['checkRole:admin,manager,staff']);
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
Route::resource('colors', ColorController::class)->middleware(['checkRole:admin,manager,staff']);
Route::get('/addcolor', function () {
    return view('colors.create');
})->middleware(['checkRole:admin,manager,staff']);


//sizes route
Route::resource('sizes', SizeController::class)->middleware(['checkRole:admin,manager,staff']);
Route::get('/addsize', function () {
    return view('sizes.create');
});
Route::get('/sizes/{size}/edit', [SizeController::class, 'edit'])->name('sizes.edit');
Route::put('/sizes/{size}', [SizeController::class, 'update'])->name('sizes.update');



//suppliers route
Route::resource('suppliers', SupplierController::class)->middleware(['checkRole:admin']);
Route::get('/addsupplier', function () {
    return view('suppliers.create');
});
Route::post('/suppliers.search', [SupplierController::class, 'search'])->name('supplier.search');


//customers route
Route::resource('customers', CustomerController::class)->middleware(['checkRole:admin,manager,staff']);
Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('/customers.search', [CustomerController::class, 'search'])->name('customer.search');



//purchases route
Route::resource('purchases', PurchaseController::class)->middleware(['checkRole:admin']);
Route::get('/purchases/create', [PurchaseController::class, 'create'])->name('purchases.create')->middleware(['checkRole:admin']);
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
})->name('purchases.search')->middleware(['checkRole:admin']);


//products route
Route::resource('products', ProductController::class)->middleware(['checkRole:admin,manager,staff']);
Route::get('/products', [ProductController::class, 'index'])->name('products.index')->middleware(['checkRole:admin,manager,staff']);
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
// Edit Product
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
// Update Product
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::post('/products/search', [ProductController::class, 'search'])->name('products.search');


// example route
Route::get("/tests", function () {
    $row = DB::select("SELECT q.* FROM (SELECT id, id_number, @i:=@i+1 as row_number
            FROM school_users u, (SELECT @i:=0) AS r where DATE_FORMAT(u.created_at, '%Y')=DATE_FORMAT(CURRENT_DATE, '%Y') GROUP BY id, id_number) q");
    // if (!count($row)) {
    //     $id_number = date('Y') . str_pad($school->id, 2, '0', STR_PAD_LEFT) . str_pad(1, 7, '0', STR_PAD_LEFT);
    // } else {
    //     $id_number = date('Y') . str_pad($school->id, 2, '0', STR_PAD_LEFT) . str_pad($row[0]->row_number, 7, '0', STR_PAD_LEFT);
    // }
});
//->middleware(['checkRole:admin,manager,staff']);

require __DIR__ . '/auth.php';
