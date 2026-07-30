<?php
use App\Http\Controllers\API\ProductController;

Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'show']);
