<?php

Route::get('/', 'PhoneMakeAndModelController@index')->name('home');
Route::get('/{phoneName}', 'PhoneMakeAndModelController@show')->name('listByPhoneName');
