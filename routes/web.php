<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BlogController;
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
Route::get('blog/{slug}', [BlogController::class, 'getSingle'])->name('blog.single')->where('slug', '[\w\d\-\_]+');
Route::get('/about', [PagesController::class, 'getAbout']);
Route::get('/', [PagesController::class, 'getIndex']);
Route::resource('posts', PostController::class);