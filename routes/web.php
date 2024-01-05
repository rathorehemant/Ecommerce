<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/products', [ProductController::class, 'productsListing'])->name('product.listing');
Route::get('/add-products', [ProductController::class, 'productsAdding'])->name('product.adding');
Route::get('/products/categories', [ProductController::class, 'productsCategoryListing'])->name('product.category.listing');
Route::get('/products/add-categories', [ProductController::class, 'productsCategoryAdding'])->name('product.category.adding');
Route::post('/save-products', [ProductController::class, 'saveProducts'])->name('product.save');
Route::post('/products/save-categories', [ProductController::class, 'saveproductsCategory'])->name('product.category.save');
Route::delete('/delete-product/{id}', [ProductController::class, 'deleteProduct'])->name('product.delete');
Route::delete('/delete-product-category/{id}', [ProductController::class, 'deleteProductCategory'])->name('product.category.delete');
Route::get('/products/view-product/{id}', [ProductController::class, 'singleProductView'])->name('product.view');



