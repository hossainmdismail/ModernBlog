<?php

use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




//========= BackEnd Controllers =========//
Route::group(['middleware' => ['checkRole:5','auth']], function () {
    Route::resources([
        // 'category'      => CategoryController::class,
        'subcategory'   => SubCategoryController::class,
        'blogpost'      => BlogPostController::class,
    ]);
    Route::resource('category',CategoryController::class);
});

