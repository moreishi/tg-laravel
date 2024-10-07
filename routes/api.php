<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;

Route::get('products/categories', [ProductController::class, 'categories']);
Route::get('products/category-list', [ProductController::class, 'category_list']);
Route::resource('products', ProductController::class);

