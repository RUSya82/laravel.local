<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*sdrrggweergeergwergergergergergg*/
Route::get('/', 'HomeController@index')->name('home');

Route::get('/admin', 'admin\AdminController@index');

Route::get('/admin/test/{x}', 'admin\AdminController@test');

//Route::get('/news', 'NewsController@index')->name('news');
//Route::get('/news/category/{category_id}', 'NewsController@categoryOne');
//Route::get('/news/newsone/{id}', 'NewsController@newsOne');

Route::group([
    'prefix' => 'news',
    'as' => 'news.'
], function () {
    Route::get('/', 'NewsController@index')->name('news');
    Route::get('/category/{category_id}', 'NewsController@categoryOne');
    Route::get('/newsone/{id}', 'NewsController@newsOne');
});


Route::get('/about', 'AboutController');
Route::get('/main','MainController@index');