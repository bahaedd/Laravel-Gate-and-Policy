<?php

use App\Models\Post;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/posts/delete', [App\Http\Controllers\PostController::class, 'delete'])->middleware('can:isAdmin')->name('post.delete');

Route::get('/posts/update', [App\Http\Controllers\PostController::class, 'update'])->middleware('can:isManager')->name('post.update');

Route::get('/posts/create', [App\Http\Controllers\PostController::class, 'create'])->middleware('can:isUser')->name('post.create');


Route::put('/post/{post}', function (Post $post) {
    // The current user may update the post...
})->middleware('can:update,post');
