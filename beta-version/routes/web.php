<?php

use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\frontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Members;
use App\Http\Controllers\SettingController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();





//========= BackEnd Controllers =========//
Route::group(['middleware' => ['checkRole:5','auth']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resources([
        'category'      => CategoryController::class,
        'subcategory'   => SubCategoryController::class,
        'blogpost'      => BlogPostController::class,
        'member'        => Members::class,
    ]);
});

//========== Frontend controllers ==========//
Route::get('/', [frontendController::class, 'home'])->name('home');
Route::get('/about', [frontendController::class, 'about'])->name('about');
Route::get('/contact', [frontendController::class, 'contact'])->name('contact');

//========== Ajax ==========//
Route::post('/getsubcat', [BlogPostController::class, 'getsubcat']);


//========== Setting ==========//
Route::get('/site/setting', [SettingController::class, 'site_setting'])->name('site.setting');
Route::post('/setting/store', [SettingController::class, 'setting_store'])->name('setting.store');
Route::get('/social/link', [SettingController::class, 'social_link'])->name('social.link');
Route::post('/social/icon', [SettingController::class, 'social_icon'])->name('social.icon');
