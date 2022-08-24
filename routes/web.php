<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\blogController;
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
Route::get('/',[blogController::class,'blogIndex'])->name('blogIndex');
Route::get('login', [authController::class, 'loginIndex'])->name('login');
Route::get('logout', [authController::class, 'logoutUser'])->name('logoutUser');
Route::post('login-form', [authController::class, 'loginForm'])->name('loginForm');


Route::get('register', [authController::class, 'registerIndex'])->name('registerIndex');
Route::post('register-form', [authController::class, 'registerForm'])->name('registerForm');

Route::group(['middleware'=>'auth'],function(){
    Route::get('/dashboard',[authController::class,'dashboard'])->name('dashboard');
    
    Route::get('create-blog',[blogController::class,'newBlog'])->name('newBlog');
    Route::post('create',[blogController::class,'blogForm'])->name('blogForm');
    Route::post('update-blog',[blogController::class,'blogUpdateForm'])->name('blogUpdateForm');
    Route::get('update-blog/{id}',[blogController::class,'updateBlog'])->name('updateBlog');
    Route::get('delete-blog/{id}',[blogController::class,'deleteBlog'])->name('deleteBlog');

    
});




