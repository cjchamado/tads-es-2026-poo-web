<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::post('auth/login', [AuthController::class, 'login']);

Route::group([
    'middleware' => [
        'auth:sanctum',
    ]
], function() {
    Route::apiResources([
        'categories' => CategoryController::class,
        'products' => ProductController::class,
        'customers' => CustomerController::class,
        'reviews' => ReviewController::class,
        'orders' => OrderController::class,
    ]);
});
