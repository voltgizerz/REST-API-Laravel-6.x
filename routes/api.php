<?php


Route::post('register','Api\RegisterController@action');
Route::post('login','Api\LoginController@action');
Route::get('me','Api\UserController@me')->middleware('auth:api');
