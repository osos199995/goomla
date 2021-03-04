<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResources(['categories' => 'api\categories']);
Route::apiResources(['orders' => 'api\orders']);
Route::apiResources(['packages' => 'api\Packages']);
Route::apiResources(['subcategories' => 'api\subcategories']);
Route::apiResources(['products' => 'api\products']);
Route::apiResources(['companies' => 'api\companies']);
Route::apiResources(['mostproducts' => 'api\mostproducts']);
Route::apiResources(['previousorders' => 'api\previousorders']);
Route::apiResources(['companysubcategory' => 'api\companysubcategory']);
Route::apiResources(['complaints' => 'api\complaints']);
Route::apiResources(['complaintsproducts' => 'api\complaintsproducts']);
Route::apiResources(['users' => 'api\users']);
Route::apiResources(['sliders' => 'api\sliders']);
Route::apiResources(['discounts' => 'api\discounts']);
Route::apiResources(['contacts' => 'api\contacts']);
Route::apiResources(['min_prices' => 'api\min_prices']);
Route::apiResources(['mandobs' => 'api\mandobs']);
Route::apiResources(['deliveries' => 'api\deliveries']);
//Route::apiResources(['stores' => 'api\stores']);
Route::apiResources(['depts' => 'api\depts']);
// Route::get('/api/users/{id}', 'api\users@show');
Route::put('mostproducts', 'api\mostproducts@update');
Route::put('orders', 'api\orders@update');
Route::put('users', 'api\users@update');
Route::put('products', 'api\products@update');
Route::delete('orders/{id}', 'api\orders@destroy');
Route::get('orders/{id}', 'api\orders@show');
Route::get('products/{id}', 'api\products@show');
Route::get('users/{id}', 'api\users@show');
Route::post('users/getname', 'api\users@search');
Route::get('offers', 'api\products@offers');
Route::get('stores', 'api\stores@index');
Route::post('orders/{id}/mandobs', 'api\orders@mandobOrderStatus');
