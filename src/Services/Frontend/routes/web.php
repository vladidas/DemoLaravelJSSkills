<?php

Route::group([
    'prefix'     => \App\Services\Frontend\Http\Middleware\LocaleMiddleware::getPrefix(),
    'middleware' => ['web'],
    'as'         => 'frontend.'
], function () {

    Route::get('/', 'SubDistrictController@index')->name('home');

    Route::get('/sub-districts/search', 'SubDistrictController@search')->name('sub-districts.search');
    Route::get('/sub-districts/{id}',   'SubDistrictController@show')->name('sub-districts.show');

});
