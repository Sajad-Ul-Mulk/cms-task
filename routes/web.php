<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionController;
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

Route::get('/', function () {
    return view('index');
})->name('home');


Route::resource('posts', PostController::class); //  Post Routes
Route::resource('categories', CategoryController::class);//  Categories Routes
Route::resource('users', UserController::class);//   User Routes
Route::resource('sessions', SessionController::class)->only('create', 'store', 'destroy')->names(['create' => 'login']); //   Session Controller

//Route::get('/posts/index',[PostController::class,'index'])->name('IndexPage');
//Route::get('/post/{post:slug}',[PostController::class,'show'])->name('ShowSinglePost');
//Route::get('CreatePost',[PostController::class,'create'])->name('ShowSinglePost');
//Route::post('post/store',[PostController::class,'store'])->name('ShowSinglePost');
//
//Route::get('/categories/index',[CategoryController::class,'index'])->name('AllCategories');
//Route::get('/category/create',[CategoryController::class,'create'])->name('CreateCategory');
//Route::post('/category/store',[CategoryController::class,'store'])->name('StoreCategory');
//                      Registration Routes
//Route::get('Register/create',[RegisterController::class,'create'])->name('loadSignupForm');
//Route::post('Register/store',[RegisterController::class,'store']);
//Route::get('Register/login',[RegisterController::class,'loadLoginPage'])->name('loadSignInForm');
//Route::post('Register/login',[RegisterController::class,'loginUser'])->name('loadSignInForm');
//Route::get('Register/logout',[RegisterController::class,'logoutUser'])->name('loadSignInForm');
//Route::get('/AllUsers',[UserController::class,'index']);
//Route::get('/dashboard/{user}',[UserController::class,'show'])->name('dashboard');






