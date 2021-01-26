<?php

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

/*Route::get('/', function () {
    return view('auth.login');
});
*/
Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('/');
Auth::routes();

//LOGIN


//PRODUCT RELATED ROUTES
Route::get('/product/view', [App\Http\Controllers\HomeController::class, 'index'])->name('view');
Route::get('/product/add', [App\Http\Controllers\HomeController::class,'create'])->name('add');
Route::post('/product/save', [App\Http\Controllers\HomeController::class,'store'])->name('save');
Route::get('/product/edit/{id}', [App\Http\Controllers\HomeController::class,'edit'])->name('edit');
Route::post('/product/save-edit', [App\Http\Controllers\HomeController::class,'update'])->name('save-edit');
Route::get('/product/delete/{id}', [App\Http\Controllers\HomeController::class,'destroy'])->name('delete');

//CATEGORY
Route::get('/category/view', [App\Http\Controllers\CategoryController::class, 'index'])->name('view');


//DASHBOARD
Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');
