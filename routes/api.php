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


Route::prefix('articles')->group(function () {
  Route::get('/admin', 'ArticleController@getAdmin');
  Route::get('/{article}/comment', 'ArticleController@getComments');
  Route::post('/{article}/like', 'ArticleController@like');
  Route::delete('/{article}/like', 'ArticleController@unlike');
});
Route::resource('/articles', 'ArticleController');

Route::prefix('/comments')->group(function() {
  Route::post('/{comment}/like', 'CommentController@like');
  Route::delete('/{comment}/like', 'CommentController@unlike');
});
Route::resource('/comments', 'CommentController');


Route::get('/home', 'HomeController@index')->name('home');
