<?php


Route::prefix('blog')->group(function() {

    Route::resource('/', 'BlogController');
});
