<?php
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {
    Route::resource('/blogs', 'BlogController');
    Route::get('/blog/search', 'BlogController@search')->name('blogs.search');
});
