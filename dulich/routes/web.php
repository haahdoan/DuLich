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

//dang ki
Route::get('dang-ki', [
    'as'=>'dangki',
    'uses'=>'Auth\RegisterController@getSignin'
]);

Route::post('dang-ki', [
    'as'=>'dangki',
    'uses'=>'Auth\RegisterController@postSignin'
]);

//dang nhap
Route::get('dang-nhap', [
    'as'=>'dangnhap',
    'uses'=>'Auth\LoginController@getLogin'
]);

Route::post('dang-nhap', [
    'as'=>'dangnhap',
    'uses'=>'Auth\LoginController@postLogin'
]);
