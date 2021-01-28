<?php

use App\Http\Controllers\DownloadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ImagesCommentController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserUpdateController;
use App\Http\Controllers\CommentsLikeController;

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

Route::get('/', [HomeController::class, 'index'])->name('mainhome');

Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->name('register')->middleware('guest');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'store'])->name('login')->middleware('guest');

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');
Route::get('/logout', function(){return redirect()->route('mainhome');})->name('logout');

Route::get('/user/{id}', [UserProfileController::class, 'index'])->name('user.index');

Route::get('/user/{id}/update', [UserUpdateController::class, 'index'])->name('user.update')->middleware('auth');
Route::post('/user/{id}/update', [UserUpdateController::class, 'update'])->name('user.update')->middleware('auth');

Route::get('/images/create', [ImageController::class, 'create'])->name('image.create')->middleware('auth');
Route::post('/images/create', [ImageController::class, 'store'])->name('image.store')->middleware('auth');




Route::post("/images/{image}/likes", [LikeController::class, 'store'])->name('images.like')->middleware('auth');
Route::delete("/images/{image}/likes", [LikeController::class, 'destroy'])->name('images.like')->middleware('auth'); 

Route::post('images/{image}/comment', [ImagesCommentController::class, 'store'])->name('images.comment')->middleware('auth');

Route::post("/images/{image}/downloads", [DownloadController::class, 'store'])->name('images.download')->middleware('auth');



Route::get('/images/{id}', [ImageController::class, 'show'])->name('image.show');

Route::post("comments/{comment}/likes", [CommentsLikeController::class, 'store'])->name('comments.like')->middleware('auth');
Route::delete('comments/{comment}/likes', [CommentsLikeController::class, 'destroy'])->name('comments.like')->middleware('auth');

