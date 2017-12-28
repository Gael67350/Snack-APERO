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

use App\Http\Middleware\AuthenticatedAsAdmin;

// Default route
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home/{id}', 'HomeController@index')->name('homeAlt');
Route::get('/user/profile/{id}', 'UsersController@profile')->name('profile');

// Authentication Routes
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Pages linkers
Route::group(['prefix' => 'admin', 'middleware' => AuthenticatedAsAdmin::class], function () {
    Route::get('dispLog', 'ProductsController@displayLogs');
    Route::get('srchPers', 'UsersController@launchPersonSearch');
    Route::get('srchProd', 'ProductsController@launchProductSearch');
    Route::get('reinitDb', 'PurchasesController@initDbReinitialiser');
    Route::get('productMgr', 'ProductsController@openManager');
    Route::get('userMgr/{id?}', 'UsersController@openUserManager');
});

Route::group(['prefix' => 'children'], function () {
    Route::get('/', 'ChildsController@index');
    Route::get('/display/{id}', 'ChildsController@display');
});

Route::group(['prefix' => 'stock'], function () {
    Route::get('showStock', 'ProductsController@displayStocks');
    Route::get('insertBuy', 'ProductsController@recordBuy');
    Route::get('verifyBuy', 'ProductsController@buyHistory');
});

Route::group(['prefix' => 'consumption'], function () {
    Route::get('srchChld', 'ConsumptionsController@showChildSrch');
    Route::get('nuConsum', 'ChildsController@openChildManager');
    Route::get('delConsum', 'ConsumptionsController@showExistingConsumption');
    Route::get('insInflow', "InflowsController@openInflows");
    Route::post('insInflow/validate',"InflowsController@insertNewInflow");
});
