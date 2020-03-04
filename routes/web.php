<?php

Route::get('/', 'MainController@index')->name('home');

//Route::resource('admin', 'admin\NewsController');
Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'as' => 'admin.'
], function () {
    Route::get('/', 'NewsController@index')->name('index');
    Route::match(['post', 'get'],'/create', 'NewsController@create')->name('addNews');
    Route::get('/edit{news}', 'NewsController@edit')->name('editNews');
    Route::post('/save{news}', 'NewsController@save')->name('saveNews');
    Route::get('/delete{news}', 'NewsController@delete')->name('deleteNews');
   // Route::get('/test2', 'AdminController@test2')->name('test2');
});

Route::group([
    'prefix' => 'news',
    'as' => 'news.'
], function () {
    Route::get('/', 'NewsController@index')->name('news');
    Route::get('/category{category}', 'NewsController@categoryOne')->name('oneCat');
    Route::get('/newsone{news}', 'NewsController@newsOne')->name('newsOne');
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
