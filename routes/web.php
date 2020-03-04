<?php

Route::get('/', 'MainController@index')->name('home');


Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'as' => 'admin.'
], function () {
    Route::get('/', 'AdminController@index')->name('home');
    Route::match(['post', 'get'],'/add', 'AdminController@addNews')->name('addNews');
    Route::get('/test2', 'AdminController@test2')->name('test2');
});

Route::group([
    'prefix' => 'news',
    'as' => 'news.'
], function () {
    Route::get('/', 'NewsController@index')->name('news');
    Route::get('/category/{category_id}', 'NewsController@categoryOne')->name('oneCat');
    Route::get('/newsone/{id}', 'NewsController@newsOne')->name('newsOne');
});

Route::group([
    'prefix' => 'about',
    'as' => 'about.'
], function () {
    Route::get('/', 'AboutController@index')->name('about');
    Route::post('/addfeedback', 'AboutController@addFeedback')->name('addfeedback');
});

Auth::routes();


//Route::get('/home', 'HomeController@index')->name('home');
