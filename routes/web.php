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

Auth::routes();

Route::prefix('admin')->middleware('checkrole')->group(function () {
    Route::get('/', 'back\AdminController@index')->name('admin.index');
    Route::get('/users', 'back\UserController@index')->name('admin.users');
    Route::get('/profile/{user}', 'back\UserController@edit')->name('admin.profile');
    Route::post('/profileupdate/{user}', 'back\UserController@update')->name('aadmin.profileupdate');
    Route::get('/users/delete/{user}', 'back\UserController@destroy')->name('admin.user.delete');
    Route::get('/users/status/{user}', 'back\UserController@updatestatus')->name('admin.user.status');
});


Route::prefix('admin/categories')->middleware('checkrole')->group(function () {
    Route::get('/', 'back\CategoryController@index')->name('admin.categories');
    Route::get('/create', 'back\CategoryController@create')->name('admin.categories.create');
    Route::post('/store', 'back\CategoryController@store')->name('admin.categories.store');
    Route::get('/edit/{category}', 'back\CategoryController@edit')->name('admin.categories.edit');
    Route::post('/update/{category}', 'back\CategoryController@update')->name('admin.categories.update');
    Route::get('/destroy/{category}', 'back\CategoryController@destroy')->name('admin.categories.destroy');
});


Route::prefix('admin/articles')->middleware('checkrole')->group(function () {
    Route::get('/', 'back\ArticleController@index')->name('admin.articles');
    Route::get('/create', 'back\ArticleController@create')->name('admin.articles.create');
    Route::post('/store', 'back\ArticleController@store')->name('admin.articles.store');
    Route::get('/edit/{article}', 'back\ArticleController@edit')->name('admin.articles.edit');
    Route::post('/update/{article}', 'back\ArticleController@update')->name('admin.articles.update');
    Route::get('/destroy/{article}', 'back\ArticleController@destroy')->name('admin.articles.destroy');
    Route::get('/status/{article}', 'back\ArticleController@updatestatus')->name('admin.articles.status');
});

Route::prefix('admin/comments')->middleware('checkrole')->group(function () {
    Route::get('/', 'back\CommentController@index')->name('admin.comments');
    Route::get('/edit/{comment}', 'back\CommentController@edit')->name('admin.comments.edit');
    Route::post('/update/{comment}', 'back\CommentController@update')->name('admin.comments.update');
    Route::get('/destroy/{comment}', 'back\CommentController@destroy')->name('admin.comments.destroy');
    Route::get('/status/{comment}', 'back\CommentController@updatestatus')->name('admin.comments.status');
});








Route::get('/', function () {
    return view('front.main');
})->name('home');

Route::get('/profile/{user}', 'UserController@edit')->name('profile');
Route::post('/update/{user}', 'UserController@update')->name('profileupdate');
Route::get('/articles', 'front\ArticleController@index')->name('articles');
Route::get('/article/{article}', 'front\ArticleController@show')->name('article');

Route::post('/comment/{article}', 'front\CommentController@store')->name('comment.store');
