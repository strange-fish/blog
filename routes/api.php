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

Route::get('/article/{article}/comment', 'ArticleController@getComment');
Route::resource('/article', 'ArticleController');

Route::post('/comment/{comment}/like', 'CommentController@like');
Route::delete('/comment/{comment}/like', 'CommentController@unlike');
Route::resource('/comment', 'CommentController');




Route::get('/home', 'HomeController@index')->name('home');
