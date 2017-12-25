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

// Default route
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'HomeController@index')->name('home');
Route::get('/user/profile/{id}', 'UsersController@profile')->name('profile');

// Authentication Routes
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

//pages linkers
Route::get('/dispLog', 'ProductsController@displayLogs');
Route::get('/srchPers', 'ProductsController@launchPersonSearch');
Route::get('/srchProd', 'ProductsController@launchProductSearch');
Route::get('/reinitDb', 'PurchasesController@initDbReinitialiser');
Route::get('/showStock', 'ProductsController@displayStocks');
Route::get('/insertBuy', 'ProductsController@recordBuy');
Route::get('/verifyBuy', 'ProductsController@buyHistory');
Route::get('/childAffich', 'ChildsController@showChilds');
Route::get('/srchChld', 'ConsumptionsController@showChildSrch');
