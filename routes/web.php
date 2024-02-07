<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
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

Route::get('/', function (){
    return view('index');
});


//                      Post Routes

Route::resource('Post',PostController::class);


//Route::get('/posts/index',[PostController::class,'index'])->name('IndexPage');
//Route::get('/post/{post:slug}',[PostController::class,'show'])->name('ShowSinglePost');
//Route::get('CreatePost',[PostController::class,'create'])->name('ShowSinglePost');
//Route::post('post/store',[PostController::class,'store'])->name('ShowSinglePost');


//                      Categories Routes
Route::get('/categories/index',[CategoryController::class,'index'])->name('AllCategories');
Route::get('/category/create',[CategoryController::class,'create'])->name('CreateCategory');
Route::post('/category/store',[CategoryController::class,'store'])->name('StoreCategory');


//                      Registration Routes
Route::get('Register/create',[RegisterController::class,'create'])->name('loadSignupForm');
Route::post('Register/store',[RegisterController::class,'store']);
Route::get('Register/login',[RegisterController::class,'loadLoginPage'])->name('loadSignInForm');
Route::post('Register/login',[RegisterController::class,'loginUser'])->name('loadSignInForm');
Route::get('Register/logout',[RegisterController::class,'logoutUser'])->name('loadSignInForm');


//                          User Routes
Route::get('/AllUsers',[UserController::class,'index']);
Route::get('/dashboard/{user}',[UserController::class,'show'])->name('dashboard');
Route::delete('/deletePost/{post:id}',[UserController::class,'destroy']);
Route::patch('userPostEdit/{post}',[UserController::class,'update1']);
Route::get('/editPost/{post}',[UserController::class,'edit']);
Route::post('/editPost/{post}',[UserController::class,'edit']);










