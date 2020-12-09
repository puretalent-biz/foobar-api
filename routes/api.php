<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*Route::get('/user', [
    'use' => 'users.index',
    'uses' => 'Users\UserController@index',
]);
*/
Route::resource('users', \Users\UserController::class)->only([
    'index', 'show'
]);



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
