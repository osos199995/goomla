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

Route::get('/admin', 'HomeController@index')->name('admin');

Route::resource('/admin/companies','admin\companies');
Route::resource('/admin/mandoobs','admin\mandobs');
Route::resource('/admin/packages','admin\Packages');
Route::resource('/admin/categories','admin\categories');
Route::resource('/admin/subcategories','admin\subcategories');
Route::resource('/admin/products','admin\products');
Route::resource('/admin/orders','admin\orders');
Route::resource('/admin/users','admin\users');
Route::resource('/admin/stores','admin\stores');
Route::resource('/admin/mostproducts','admin\mostproducts');
Route::resource('/admin/previousorders','admin\previousorders');
Route::resource('/admin/complaints','admin\complaints');
Route::resource('/admin/complaintsproducts','admin\complaintsproducts');
Route::resource('/admin/sliders','admin\sliders');
Route::resource('/admin/discounts','admin\discounts');
Route::resource('/admin/contacts','admin\contacts');
Route::resource('/admin/depts','admin\depts');
Route::get('/admin/orders/{id}/track', 'admin\orders@tracks');
Route::get('/admin/users/status/{id}', 'admin\users@status');
Route::get('/admin/users/block/{id}', 'admin\users@block');
Route::post('/admin/orders/{id}/{user_id}/track', 'admin\orders@track');
Route::get('/admin/orders/show/{user_id}/{order_id}', 'admin\orders@show');
Route::get('/admin/orders/{id}/mandobs', 'admin\orders@mandobs');
Route::post('/admin/orders/{id}/{user_id}/mandob', 'admin\orders@mandob');
Route::get('/admin/mandoobs/status/{id}', 'admin\mandobs@status');
Route::get('/admin/mandoobs/block/{id}', 'admin\mandobs@block');




Route::prefix('store')->group(function(){

    Route::get('/login', 'Auth\StoreLoginController@showLoginForm')->name('store.login');
    Route::get('/logout', 'Auth\StoreLoginController@logout')->name('store.logout');

    Route::get('/', 'Users\Store\StoreController@index')->name('store.dashboard');
    Route::post('/login', 'Auth\StoreLoginController@login')->name('store.login.submit');

    Route::group(['middleware' => ['store']], function () {

        Route::get('/', 'Users\Store\StoreController@index')->name('store.dashboard');
        Route::resource('/storecategories', 'stores\CategoriesController');
        Route::resource('/storesubcategories', 'stores\StoreSubcategoryController');
        Route::resource('/storeproducts', 'stores\StoreProductsController');
//        Route::resource('/categories', 'stores\CategoriesController@index')->name('store.categories');
    });


    });
