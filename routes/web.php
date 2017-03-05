<?php

use App\Task;

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'can:show,App\Task'], function () {
        Route::get('/tasks', function () {
            return view('tasks');
        });
    });

    Route::get('/profile/tokens', function () {
        return view('tokens');
    });

    #adminlte_routes
    Route::get('bootstraplayout', 'BootstraplayoutController@index')->name('bootstraplayout');
    Route::get('flexboxlayout', 'FlexboxlayoutController@index')->name('flexboxlayout');
    Route::get('csstables', 'CsstablesController@index')->name('csstables');
    Route::get('layoutfloat', 'LayoutfloatController@index')->name('layoutfloat');
    Route::get('layoutfloat', 'LayoutfloatController@index')->name('layoutfloat');
});
