<?php

Route::post('register', 'API\AuthController@register');
Route::post('login', 'API\AuthController@login');
Route::post('logout', 'API\AuthController@logout');


Route::middleware('jwt.auth')->get('me', function(Request $request) {
    return auth()->user();
});

Route::apiResources([
    'salones' => 'API\SalonController'
]);
