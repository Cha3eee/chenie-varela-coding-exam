<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


//Landing Page
Route::get('/', function () {
    return view('index');
});


//Entering the Admin Manage Store 
Route::get('/admin-dashboard', function () {
    return view('Admin/admin-products');
});

//Admin Add Product
Route::get('/admin-addprod', function () {
    return view('Admin/admin-addprod');
});


/*
|--------------------------------------------------------------------------
| PRODUCT 
|--------------------------------------------------------------------------
|
*/

//Adding of Product
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
//Showing of the products
Route::get('/admin-dashboard', [ProductController::class,'dashboard'])->name('Admin.admin-products');