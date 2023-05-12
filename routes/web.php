<?php

use App\Http\Controllers\ProfileController;
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
Route::get('/products', function () {
    return view('product.product');
});
Route::get('/addproduct', function () {
    return view('product.addproduct');
});

Route::get('/categories', function () {
    return view('product.categories');
});
Route::get('/addcategory', function () {
    return view('product.addcategory');
});

Route::get('/sizes', function () {
    return view('product.sizes');
});
Route::get('/addsize', function () {
    return view('product.addsize');
});

Route::get('/colors', function () {
    return view('product.colors');
});
Route::get('/addcolor', function () {
    return view('product.addcolor');
});






Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
