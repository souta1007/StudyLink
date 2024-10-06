<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ResponceController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/user', [UserController::class,'myshow'])->middleware("auth");
Route::get('/user/myshow', [UserController::class,'myshow'])->middleware("auth");

Route::controller(PostController::class)->middleware('auth')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/posts/allshow', 'allshow')->name('allshow');
    Route::post('/posts', 'store')->name('store');
    Route::get('/posts/create', 'create')->name('create');
    Route::get('/posts/{post}', 'allshow')->name('allshow');
    Route::delete('/posts/{post}', 'delete')->name('delete');
});

Route::get('/categories/{category}', [CategoryController::class,'allshow'])->middleware("auth");

Route::controller(ResponceController::class)->middleware('auth')->group(function () {
    Route::post('/responces/{post}', 'reply')->name('reply');
    Route::get('/responces/{post}/responce', 'responce')->name('responce');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
