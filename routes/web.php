<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', function () {
    return view('welcome');

});
Route::group(['middleware' => ['auth', 'admin']], function () {

    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
Route::group(['middleware' => ['auth', 'post']], function () {
    Route::resource('posts', App\Http\Controllers\PostController::class);
});
Route::get('user-roles', 'App\Http\Controllers\RolesController@getRoles');

Route::resource('comments', App\Http\Controllers\CommentController::class);

Route::get('comments/{comment}', [App\Http\Controllers\CommentController::class, 'destroy'])->name('comments.destroy');

Route::post('like', 'App\Http\Controllers\LikeDislikeController@like')->name('like');

Route::resource('forms', App\Http\Controllers\FormController::class);
