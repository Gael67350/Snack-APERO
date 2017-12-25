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
Route::get('/admin/dispLog', 'ProductsController@displayLogs');
Route::get('/admin/srchPers', 'UsersController@launchPersonSearch');
Route::get('/admin/srchProd', 'ProductsController@launchProductSearch');
Route::get('/admin/reinitDb', 'PurchasesController@initDbReinitialiser');

Route::get('/stock/showStock', 'ProductsController@displayStocks');
Route::get('/stock/insertBuy', 'ProductsController@recordBuy');
Route::get('/stock/verifyBuy', 'ProductsController@buyHistory');

Route::get('/sumup/childAffich', 'ChildsController@showChilds');

Route::get('/consumption/srchChld', 'ConsumptionsController@showChildSrch');
Route::get('/consumption/nuConsum', 'ChildsController@openChildManager');
Route::get('/consumption/delConsum','ConsumptionsController@showExistingConsumption');
Route::get('/consumption/insInflow',"InflowsController@openInflows");
