<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;

Route::get('products/category/{slug}', [ProductController::class, 'products_category']);
Route::get('products/categories', [ProductController::class, 'categories']);
Route::get('products/category-list', [ProductController::class, 'category_list']);
Route::get('products/search', [ProductController::class, 'products_query']);
Route::resource('products', ProductController::class);

