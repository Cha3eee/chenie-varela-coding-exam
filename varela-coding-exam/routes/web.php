<?php

use Illuminate\Support\Facades\Route;


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
