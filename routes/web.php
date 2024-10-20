<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ResponceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FollowController;
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

Route::controller(UserController::class)->middleware('auth')->group(function () {
    Route::get('/user/index/{user}', 'index')->name('index');
    Route::post('/user/{user}/follow', 'follow')->name('follow');
    Route::delete('user/{user}/unfollow', 'unfollow')->name('unfollow');
});

Route::get('/user', [UserController::class,'myshow'])->middleware("auth");
Route::get('/user/myshow', [UserController::class,'myshow'])->name('users.myshow')->middleware("auth");

Route::controller(PostController::class)->middleware('auth')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/posts', 'store')->name('store');
    Route::get('/posts/create', 'create')->name('posts.create');
    Route::get('/posts', 'allshow')->name('posts.allshow');
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
    Route::get('/profile/{id}',[ProfileController::class, 'get_user'])->name('profile.get_user');
});


require __DIR__.'/auth.php';
