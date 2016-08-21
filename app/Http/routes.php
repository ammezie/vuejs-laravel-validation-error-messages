<?php

Route::get('/', 'PostsController@index');
Route::post('create-post', 'PostsController@save');