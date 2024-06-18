<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\PostsController;
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

// Route::get('/', function () {
//     return view('posts');
// });

Route::get('/', 'PostsController@index')->name('post');

Route::get('post/{id}', 'PostsController@show')->name('post.show');
Route::post('post/store', 'PostsController@store')->name('post.store');

Route::post('psot/{id}/comment/store', 'CommentsController@store')->name('comment.store');
