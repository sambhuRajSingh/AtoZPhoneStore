<?php

Route::get('/', 'PhoneMakeAndModelController@index')->name('home');
Route::get('/{phoneName}', 'PhoneTarrifController@index')->name('phoneTarrif');
