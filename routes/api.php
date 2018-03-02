<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/articles/{article}/comment', 'ArticleController@getComments');;
Route::post('articles/{article}/like', 'ArticleController@like');
Route::resource('/articles', 'ArticleController');

Route::post('/comments/{comment}/like', 'CommentController@like');
Route::delete('/comments/{comment}/like', 'CommentController@unlike');
Route::resource('/comments', 'CommentController');



Route::get('/home', 'HomeController@index')->name('home');
