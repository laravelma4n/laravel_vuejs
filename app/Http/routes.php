<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'client'],function(){
    Route::get('index','ClientController@index');
    Route::get('create','ClientController@create');

});

Route::group(['prefix' => 'api','namespace' => 'Api'], function () {
    Route::resource('client','ClientController');
    Route::resource('country','CountryController');
});
