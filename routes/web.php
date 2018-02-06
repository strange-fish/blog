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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/article/{article}/comment', 'ArticleController@getComment');
Route::resource('/article', 'ArticleController');

Route::post('/comment/{comment}/like', 'CommentController@like');
Route::delete('/comment/{comment}/like', 'CommentController@unlike');
Route::resource('/comment', 'CommentController');




