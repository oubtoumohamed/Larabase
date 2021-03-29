<?php

Route::group(['middleware' => 'web'], function () {

    Route::group(['middleware' => 'auth','prefix' => '/admin/product/'], function () {

        Route::get('list', 'ProductController@index')
            ->name('product')
            ->middleware('Admin:ADMIN');
        
        Route::get('create', 'ProductController@create')
            ->name('product_create')
            ->middleware('Admin:ADMIN');
        
        Route::post('create', 'ProductController@store')
            ->name('product_store')
            ->middleware('Admin:ADMIN');
        
        Route::get('{id}/delete', 'ProductController@destroy')
            ->name('product_delete')
            ->middleware('Admin:ADMIN')
            ->where('id', '[0-9]+');
        
        Route::get('{id}', 'ProductController@show')
            ->name('product_show')
            ->middleware('Admin:ADMIN')
            ->where('id', '[0-9]+');
        
        Route::get('{id}/edit', 'ProductController@edit')
            ->name('product_edit')
            ->middleware('Admin:ADMIN')
            ->where('id', '[0-9]+');
        
        Route::post('{id}', 'ProductController@update')
            ->name('product_update')
            ->middleware('Admin:ADMIN')
            ->where('id', '[0-9]+');
    });
});