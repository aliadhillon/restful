<?php

use App\Http\Controllers\Auth\LoginController;
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
    return response()->json(['data' => ['user' => $request->user(), 'message' => 'Its working']]);
})->name('user.show');

Route::namespace('Auth')->name('user.')->group(function(){
    Route::post('register', 'RegisterController@register')->name('register');
    Route::post('login', 'LoginController@login')->name('login');
});


Route::resource('article', 'ArticleController', ['except' => ['edit', 'create']]);
