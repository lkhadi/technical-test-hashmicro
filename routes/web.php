<?php

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
Route::redirect('/', 'sign-in');

Route::prefix('auth')->group(function () {
    Route::post('sign-in/processing', 'AuthController@signIn');
    Route::get('sign-out', 'AuthController@signOut');
});
Route::get('sign-in', 'AuthViewController@signInPage')->name('sign-in');
Route::group(['middleware' => ['auth']], function () {
    Route::get('dashboard', 'DashboardController@index');
    Route::post('dashboard/checking-input', 'DashboardController@formCheck');
});
