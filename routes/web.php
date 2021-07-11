<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\HomeController;
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
Route::get('/', [HomeController::class,'index'])->name('front.home');
Route::get('kitaab', [HomeController::class,'getKitaab'])->name('front.kitaab');
Route::get('kitaab/detail/{slug}', [HomeController::class,'kitaabDetail'])->name('front.kitaab.detail');
Route::post('kitaab/detail/{slug}/message', [HomeController::class,'sendMessage'])->name('front.kitaab.message');
Route::get('about', [HomeController::class,'about'])->name('about');

Route::group(['prefix'=>'admin','middleware'=>['auth:sanctum', 'verified']],function(){
    Route::get('dashboard', [BookController::class,'dashboard'])->name('dashboard');
    
    Route::resource('categories', CategoryController::class);
    Route::resource('languages', LanguageController::class);
    Route::resource('books', BookController::class);
    Route::get('messages', [MessageController::class,'index'])->name('messages.index');
    Route::delete('messages/{id}', [MessageController::class,'destroy'])->name('messages.destroy');
    Route::post('sort-category', [CategoryController::class,'sortCategory'])->name('sortCategory');
    
    Route::get('users', [BookController::class,'userList'])->name('users.index');
    
});
