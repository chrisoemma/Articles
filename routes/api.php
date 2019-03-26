<?php

use Illuminate\Http\Request;

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



Route::get('/articles','ArticlesController@index')->name('articles');
Route::get('/article/{id}','ArticlesController@show')->name('show_article');
Route::post('/article','ArticlesController@create')->name('create_articles');
Route::put('/article/{id}','ArticlesController@update')->name('update_article');
Route::delete('article/{id}','ArticlesController@destroy')->name('delete_article');


  Route::fallback(function(){
    return response()->json([
        'message' => 'Page Not Found.'], 404);
});