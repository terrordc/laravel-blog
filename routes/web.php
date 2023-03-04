<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriesController;
use App\Http\Middleware\IsAdminMiddleware;
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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//authed access this
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::resource('posts', PostController::class);
        Route::resource('users', UserController::class);
        Route::resource('categories', CategoriesController::class, ['except' => ['create']]);
        Route::resource('comments', CommentsController::class, ['except' => ['store']]);
        Route::post('comments/{post_id}', [CommentsController::class, 'store'] )->name('comments.store');
//js???
        // Route::post('comments/{$post_id}', CommentsController::class, 'store')->name('comments.store');
        // post id
  
});

//middleware guest???
Route::get('blog', [BlogController::class, 'getIndex'])->name('blog.index');
Route::get('blog/{slug}', [BlogController::class, 'getSingle'])->name('blog.single')->where('slug', '[\w\d\-\_]+');
// Route::get('blog/{slug}#{comment_id}', [BlogController::class, 'getSingle'])->name('blog.single')->where('slug', '[\w\d\-\_]+');
Route::get('/about', [PagesController::class, 'getAbout']);
Route::get('/', [PagesController::class, 'getIndex'])->name('home');

require __DIR__.'/auth.php';
