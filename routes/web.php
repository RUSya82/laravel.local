<?php


Route::get('/', 'MainController@index')->name('home');


Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'as' => 'admin.',
    'middleware' => 'auth',
], function () {
    Route::get('/', 'NewsController@index')->name('index');
    Route::match(['post', 'get'],'/create', 'NewsController@create')->name('addNews')->middleware('check_create_news');
    Route::get('/edit{news}', 'NewsController@edit')->name('editNews')->middleware('check_edit_news');
    Route::post('/save{news}', 'NewsController@save')->name('saveNews')->middleware('check_create_news');
    Route::get('/delete{news}', 'NewsController@delete')->name('deleteNews')->middleware('check_edit_news');
    Route::get('/users', 'UserController@index')->name('users')->middleware('is_admin');
    Route::get('/users/edit{user}', 'UserController@edit')->name('editUser')->middleware(\App\Http\Middleware\isAdmin::class);
    Route::post('/users/save{user}', 'UserController@save')->name('saveUser')->middleware('is_admin');
    Route::get('/users/delete{user}', 'UserController@delete')->name('deleteUser')->middleware('is_admin');
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
