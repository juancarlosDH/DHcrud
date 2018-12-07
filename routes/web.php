<?php

Route::prefix('/products')->middleware('auth')->group( function(){
    Route::get('/', 'ProductController@index');
    
    Route::get('/create', 'ProductController@create');
    Route::post('/create', 'ProductController@store');

});



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
