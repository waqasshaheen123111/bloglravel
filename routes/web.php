<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Frontend\FrontendController;

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
    return view('welcome');
});

// Auth::routes();
// Frontend

Route::get('/',[App\Http\Controllers\Frontend\FrontendController::class,'index']);
Route::get('tutorial/{category_slug}',[App\Http\Controllers\Frontend\FrontendController::class,'viewCategoryPost']);
Route::get('tutorial/{category_slug}/{post_slug}',[App\Http\Controllers\Frontend\FrontendController::class,'viewPost']);
Route::post('comment',[App\Http\Controllers\Frontend\CommentsController::class,'store']);
Route::post('delete-comment',[App\Http\Controllers\Frontend\CommentsController::class,'destroy']);






Route::view("acess","yes boss");
Route::prefix('admin')->middleware(['isAdmin'])->group(function () {
    Route::get('/dashboard',[ App\Http\Controllers\Admin\DashboardController::class,'index']);
    // / FOr Category Table
    Route::get('category',[ App\Http\Controllers\Admin\CategoryController::class,'index']);
    Route::get('add-category',[ App\Http\Controllers\Admin\CategoryController::class,'create']);
    Route::post('add-category',[ App\Http\Controllers\Admin\CategoryController::class,'store']);
    Route::get('edit-category/{category_id}',[ App\Http\Controllers\Admin\CategoryController::class,'edit']);
    Route::put('update-category/{category_id}',[ App\Http\Controllers\Admin\CategoryController::class,'update']);
    Route::get('delete-category/{category_id}',[ App\Http\Controllers\Admin\CategoryController::class,'destroy']);

    // FOr Post Table
    Route::get('post',[ App\Http\Controllers\Admin\PostController::class,'index']);
    Route::get('add-post',[ App\Http\Controllers\Admin\PostController::class,'create']);
    Route::post('add-post',[ App\Http\Controllers\Admin\PostController::class,'store']);
    Route::get('edit-post/{post_id}',[ App\Http\Controllers\Admin\PostController::class,'edit']);
    Route::put('update-post/{post_id}',[ App\Http\Controllers\Admin\PostController::class,'update']);
    Route::get('delete-post/{post_id}',[ App\Http\Controllers\Admin\PostController::class,'destroy']);
    // Route::get('check',[ App\Http\Controllers\Admin\PostController::class,'check']);
    // For Users Table

    Route::get('user',[ App\Http\Controllers\Admin\UserController::class,'index']);
    Route::get('edit-user/{user_id}',[ App\Http\Controllers\Admin\UserController::class,'edit']);
    Route::put('update-user/{user_id}',[ App\Http\Controllers\Admin\UserController::class,'update']);
    Route::get('delete-user/{user_id}',[ App\Http\Controllers\Admin\UserController::class,'destroy']);


// For Setting Website
    Route::get('setting',[ App\Http\Controllers\Admin\SettingController::class,'index']);
    Route::post('add-settings',[ App\Http\Controllers\Admin\SettingController::class,'store']);



});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
