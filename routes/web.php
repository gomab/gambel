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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/post/create', [
        'uses' => 'PostsController@create',
        'as'   => 'post.create'
    ]);

    Route::post('/post/store', [
        'uses' => 'PostsController@store',
        'as'   => 'post.store'
    ]);

    Route::get('/categories', [
        'uses' => 'CategoriesController@index',
        'as'   => 'category.index'
    ]);

    Route::get('/category/create', [
        'uses' => 'CategoriesController@create',
        'as'   => 'category.create'
    ]);

    Route::post('/category/store', [
        'uses' => 'CategoriesController@store',
        'as'   => 'category.store'
    ]);

    Route::get('/category/edit/{id}', [
        'uses' => 'CategoriesController@edit',
        'as'   => 'category.edit'
    ]);

    Route::get('/category/delete/{id}', [
        'uses' => 'CategoriesController@destroy',
        'as'   => 'category.delete'
    ]);

    Route::post('/category/update/{id}', [
        'uses' => 'CategoriesController@update',
        'as'   => 'category.update'
    ]);

    Route::get('/posts', [
        'uses' => 'PostsController@index',
        'as'   => 'post.index'
    ]);

    Route::get('/post/delete/{id}', [
        'uses' => 'PostsController@destroy',
        'as'   => 'post.delete'
    ]);

    Route::get('/post/edit/{id}', [
        'uses' => 'PostsController@edit',
        'as'   => 'post.edit'
    ]);

    Route::post('/post/update/{id}', [
        'uses' => 'PostsController@update',
        'as'   => 'post.update'
    ]);

    Route::get('/posts/trashed', [
        'uses' => 'PostsController@trashed',
        'as'   => 'post.trashed'
    ]);

    Route::get('/posts/kill/{id}', [
        'uses' => 'PostsController@kill',
        'as'   => 'post.kill'
    ]);

    Route::get('/posts/restore/{id}', [
        'uses' => 'PostsController@restore',
        'as'   => 'post.restore'
    ]);

    Route::get('/tags/edit/{id}', [
        'uses' => 'TagsController@edit',
        'as'   => 'tag.edit'
    ]);

    Route::post('/tags/update/{id}', [
        'uses' => 'TagsController@update',
        'as'   => 'tag.update'
    ]);

    Route::get('/tags/delete/{id}', [
        'uses' => 'TagsController@destroy',
        'as'   => 'tag.delete'
    ]);


    Route::get('/tags', [
        'uses' => 'TagsController@index',
        'as'   => 'tag.index'
    ]);

    Route::get('/tags/create', [
        'uses' => 'TagsController@create',
        'as'   => 'tag.create'
    ]);

    Route::post('/tags/store', [
        'uses' => 'TagsController@store',
        'as'   => 'tag.store'
    ]);

    Route::get('/users', [
        'uses' => 'UsersController@index',
        'as'   => 'user.index'
    ]);

    Route::get('/user/create', [
        'uses' => 'UsersController@create',
        'as'   => 'user.create'
    ]);

    Route::post('/user/store', [
        'uses' => 'UsersController@store',
        'as'   => 'user.store'
    ]);

    Route::get('/user/edit', [
        'uses' => 'UsersController@edit',
        'as'   => 'user.edit'
    ]);

    Route::post('/user/update', [
        'uses' => 'UsersController@update',
        'as'   => 'user.update'
    ]);

    Route::get('/user/delete/{id}', [
        'uses' => 'UsersController@destroy',
        'as'   => 'user.delete'
    ]);

    Route::get('/user/admin/{id}', [
        'uses' => 'UsersController@admin',
        'as'   => 'user.admin'
    ]);

    Route::get('/user/not-admin/{id}', [
        'uses' => 'UsersController@not_admin',
        'as'   => 'user.not.admin'
    ]);

    Route::get('/user/profile', [
        'uses' => 'ProfilesController@index',
        'as'   => 'user.profile'
    ]);

    Route::post('/user/profile/update', [
        'uses' => 'ProfilesController@update',
        'as'   => 'user.profile.update'
    ]);

    Route::get('/settings', [
        'uses' => 'SettingsController@index',
        'as'   => 'settings'
    ]);

    Route::post('/settings/update', [
        'uses' => 'SettingsController@update',
        'as'   => 'settings.update'
    ]);



});