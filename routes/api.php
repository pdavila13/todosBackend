<?php

//Route::group(['prefix' => 'v1','middleware' => 'auth:api'], function () {
Route::group(['prefix' => 'v1','middleware' => ['cors','auth:api']], function () {
    Route::resource('task', 'TasksController');
    Route::resource('user', 'UsersController');
    Route::resource('user.task', 'UserTasksController');
    Route::get('/user', function () {
       return Auth::User();
    });

    Route::post('/user/gcmtoken', 'GcmTokensController@addToken');
    Route::get('/user/messages', 'MessagesController@fetchMessage');
});
