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

Route::get('/restaurants', 'RestaurantController@getResturants');
Route::get('/categories', 'CategorieController@getCategories');
Route::get('/produits', 'ProduitsController@getProduits');
Route::get('/commandes/{id}', 'CommandeController@getCommandes');
Route::get('/orders/{id}', 'OrderController@getOrders');
Route::get('/clients/{firebase_id}', 'ClientController@getClient');
Route::post('/orders', 'OrderController@ajouterOrder');
Route::post('/clients', 'ClientController@ajouterClient');

