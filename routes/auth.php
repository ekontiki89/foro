<?php

// Routes that required authentication.

Route::get('posts/create',[
    'uses'  =>  'CreatePostController@create',
    'as'    =>  'posts.create'
]);
Route::post('posts/create',[
    'uses'  =>  'CreatePostController@store',
    'as'    =>  'posts.store'
]);