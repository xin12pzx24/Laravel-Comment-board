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
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
Route::post('register', 'UserController@register');
Route::get('register', function () {
	return 'Get() of register';
});
Route::post('login', 'UserController@login');
Route::post('comment', 'CommentController@comment');
Route::get('getComments', 'CommentController@getComments');

        //Route::get('getUserData', 'UserController@getUserData');
Route::get('showComment', 'CommentController@showComment');
Route::get('inquireComment', 'CommentController@inquireComment');
Route::post('editComment', 'CommentController@editComment');
Route::delete('deleteComment', 'CommentController@deleteComment');