<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
//
//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::middleware('auth')->group(function (){
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/admin/product/create', [ProductController::class, 'create'])->name('product.create');
Route::get('/admin/products/index', [ProductController::class, 'index'])->name('product.index');
Route::post('/admin/product', [ProductController::class, 'store'])->name('product.store');
Route::delete('/admin/{product}/delete', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::get('/admin/{category}/show', [ProductController::class, 'show'])->name('product.show');


Route::get('/admin/category/create', [CategoryController::class, 'index'])->name('category.index');

Route::post('/admin/category/store', [CategoryController::class, 'store'])->name('category.store');

Route::delete('/admin/{category}/delete', [CategoryController::class, 'destroy'])->name('category.destroy');
});
