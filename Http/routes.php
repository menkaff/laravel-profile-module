<?php

Route::group(['middleware' => ['web','auth'], 'prefix' => 'profile', 'namespace' => 'Modules\Profile\Http\Controllers'], function () {

    Route::get('/', 'ProfileController@show');

    Route::get('/password', 'ProfileController@password_get');

    Route::post('/password', 'ProfileController@password_post');

    Route::get('/info', 'ProfileController@info_get');

    Route::post('/info', 'ProfileController@info_post');

    Route::get('/email', 'ProfileController@email_get');

    Route::post('/email', 'ProfileController@email_post');

});
