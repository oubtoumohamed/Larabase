<?php

Route::group(['middleware' => 'web'], function () {

    Route::group(['middleware' => 'auth','prefix' => '/admin/Catégorie/'], function () {

        Route::get('list', 'CatégorieController@index')
            ->name('Catégorie')
            ->middleware('Admin:ADMIN');
        
        Route::get('create', 'CatégorieController@create')
            ->name('Catégorie_create')
            ->middleware('Admin:ADMIN');
        
        Route::post('create', 'CatégorieController@store')
            ->name('Catégorie_store')
            ->middleware('Admin:ADMIN');
        
        Route::get('{id}/delete', 'CatégorieController@destroy')
            ->name('Catégorie_delete')
            ->middleware('Admin:ADMIN')
            ->where('id', '[0-9]+');
        
        Route::get('{id}', 'CatégorieController@show')
            ->name('Catégorie_show')
            ->middleware('Admin:ADMIN')
            ->where('id', '[0-9]+');
        
        Route::get('{id}/edit', 'CatégorieController@edit')
            ->name('Catégorie_edit')
            ->middleware('Admin:ADMIN')
            ->where('id', '[0-9]+');
        
        Route::post('{id}', 'CatégorieController@update')
            ->name('Catégorie_update')
            ->middleware('Admin:ADMIN')
            ->where('id', '[0-9]+');
    });
});