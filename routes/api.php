<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::prefix('/product')->group(function () {
    Route::get('/list', [ProductController::class, 'list'])->name('product.list');
    Route::post('/store', [ProductController::class, 'store'])->name('product.store');
});
Route::prefix('/category')->group(function () {
    Route::get('/list', [CategoryController::class, 'list'])->name('category.list');
    // Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
});
