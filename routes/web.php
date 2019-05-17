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

// 新規登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// ログイン
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

// 未ログインユーザーでも部屋一覧と詳細ページのみ閲覧可能
Route::get('/', 'MessagesController@index');
Route::get('messages/search', 'SearchController@index');

// マイページ
Route::middleware(['auth'])->group(function () {
//    Route::resource('messages', 'MessagesController');
//    Route::resource('comments', 'CommentsController');
    Route::post('messages', 'MessagesController@store')->name('messages.store');
    Route::get('messages', 'MessagesController@index')->name('messages.index');
    Route::get('messages/create', 'MessagesController@create')->name('messages.create');
    Route::get('mypage', 'UsersController@index')->name('users.index');
});

Route::get('categories', 'SearchController@search');
Route::get('categories/{id}', 'SearchController@result');

Route::post('comments', 'CommentsController@store')->name('comments.store');
Route::get('messages/{id}', 'MessagesController@show')->name('messages.show');

