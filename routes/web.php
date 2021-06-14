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

Route::get('/', 'AdminController@index')->name('admin');
// Route::get('/Contact', 'ContactController@index');
// Route::get('/A-Propos', function () {
//     return view('A-Propos');
// });
Route::get('/login', function () {
    return view('login');
});
Route::post('/Register', 'RegistrationController@register')->name('register');
Route::post('/Login', 'LoginController@login')->name('login');
Route::post('/logout', 'Logout@logout')->name('logout');

Route::get('/auth/redirect/facebook', 'SocialController@redirect');
Route::get('/callback/facebook', 'SocialController@callback');
//Create
Route::get('/Restaurant', 'RestaurantController@ajouter')->name('restaurant');
Route::get('/Categorie', 'CategorieController@ajouter')->name('categorie');
Route::get('/Produit', 'ProduitController@ajouter')->name('produit');
Route::get('/Statut','StatutController@ajouter')->name('statut');
Route::get('/Order/{id}','OrderController@show');
//List
Route::get('/Restaurants', 'RestaurantController@list')->name('restaurants');
Route::get('/Categories', 'CategorieController@list')->name('categories');
Route::get('/Produits', 'ProduitController@list')->name('produits');
Route::get('/Statuts','StatutController@list')->name('statuts');
Route::get('/Orders','OrderController@list')->name('orders');
Route::get('/Clients','ClientController@list')->name('clients');

// Route::resource('login', 'LoginController');
// Route::resource('register', 'RegistrationController');
Route::resource('orders', 'OrderController');
Route::resource('commandes', 'CommandeController');
Route::resource('restaurants', 'RestaurantController');
Route::resource('categories', 'CategorieController');
Route::resource('produits', 'ProduitController');
Route::resource('statuts', 'StatutController');


Route::get('/ChangePassword', function () {
    return view('Admin.inc.changepwd');
})->name('changepwd');

Route::get('/Utilisateurs', function () {
    return view('Admin.inc.users');
})->name('users');

Route::get('/AddUser', function () {
    return view('Admin.inc.adduser');
})->name('adduser');

Route::get('/DeleteUser', function () {
    return view('Admin.inc.deluser');
})->name('deluser');


// Admin POST

// Route::post('/Admin/Produit', 'AdminController@store')->name('AddProduit');
// Route::post('/Admin/Categorie', 'AdminController@store')->name('AddCategorie');
// Route::post('/Admin/Restaurant', 'AdminController@store')->name('AddRestaurant');
