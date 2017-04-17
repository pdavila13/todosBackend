<?php

use PaoloDavila\TodosBackend\Task;

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'can:show,PaoloDavila\TodosBackend\Task'], function () {
        Route::get('/tasks', function () {
            $token = "TODO";
            $data = [
                "access_token" => $token
            ];
            return view('tasks',$data);
        });
    });

    Route::get('tasks1', function()
    {
        $tasks = Task::all();
        return view('tasks.index', ['tasks' => $tasks]);
    });

    Route::get('/profile/tokens', function () {
        return view('tokens');
    });

    Route::get('users', function () {
        dd(PaoloDavila\TodosBackend\User::paginate());
    });

    Route::get('/boxmodel', function () {
        return view('boxmodel');
    });

    Route::get('/float', function () {
        return view('float');
    });

    Route::get('/layoutfloat', function () {
        return view('layoutfloat');
    });

    #adminlte_routes
    Route::get('msg', 'MessagesController@index')->name('messages');
    Route::post('msg', 'MessagesController@sendMessage');

    Route::get('messages', 'MessagesController@fetchMessage');

    Route::get('bootstraplayout', 'BootstraplayoutController@index')->name('bootstraplayout');

    Route::get('flexboxlayout', 'FlexboxlayoutController@index')->name('flexboxlayout');

    Route::get('csstables', 'CsstablesController@index')->name('csstables');

});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/phpinfo', function () {
    phpinfo();
});