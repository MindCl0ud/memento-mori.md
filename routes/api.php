<?php
Route::middleware('validate.url')->group(function () {
    Route::get('/desa', 'VillageController@index');
    Route::get('/desa/{id}', 'VillageController@show');
    Route::post('/desa', 'VillageController@store');
    Route::put('/desa/{id}', 'VillageController@update');
    Route::delete('/desa/{id}', 'VillageController@destroy');
});


?>