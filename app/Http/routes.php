<?php

Route::get('/', function() {
    return view('post');
});
Route::post('create-post', 'PostsController@save');
