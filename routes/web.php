<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BlogController;
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




    Route::middleware(['is_admin'])->group(
    function(){
        Route::resource('posts', PostController::class);
    });
});


Route::get('blog', [BlogController::class, 'getIndex'])->name('blog.index');
Route::get('blog/{slug}', [BlogController::class, 'getSingle'])->name('blog.single')->where('slug', '[\w\d\-\_]+');
Route::get('/about', [PagesController::class, 'getAbout']);
Route::get('/', [PagesController::class, 'getIndex'])->name('home');

require __DIR__.'/auth.php';
