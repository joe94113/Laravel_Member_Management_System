<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::get('/home', ('App\Http\Controllers\HomeController@index'))->name('home');

Route::get('/modify/user', ('Auth\UserController@modifyUser'))->name('modify.user');
Route::post('/modify/user', ('Auth\UserController@modifyUserData'))->name('modify.user.data');

Route::get('/modify/user/pwd', ('Auth\UserController@modifyUserPwd'))->name('modify.user.pwd');
Route::post('/modify/user/pwd', ('Auth\UserController@modifyUserPwdData'))->name('modify.user.pwd.data');

Route::get('/delete/user', ('Auth\UserController@deleteUser'))->name('delete.user');
Route::post('/delete/user', ('Auth\UserController@deleteUserData'))->name('delete.user.data');


Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
/*註冊*/
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
/*重設密碼*/
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@SendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showRequestForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.request.update');
