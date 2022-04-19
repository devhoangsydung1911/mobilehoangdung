<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/** Route Home */
Route::get('/', function () {
  return view('pages');
})->name('home');

/** User Login - Register */
Route::resource('user', 'UserController');
Route::post('/logged', 'UserController@postLogin')->name('postlogin');
Route::get('/getuser', 'UserController@getUser');
Route::get('/logout', 'UserController@getLogout')->name('log');

/** Route page Login - Register */
Route::get('/login', function () {
  return view('frontend.login');
})->name('login');

Route::get('/register', function () {
  return view('frontend.register');
})->name('register');

/** Route Dashboard */
Route::group(['middleware' => ['admin', 'auth'],'prefix' => 'dashboard'], function () {
  Route::get('/', function () {
    return view('adminlte.homedb');
  })->name('homeDB');

  // Product
  Route::get('/product', 'ProductController@getAllProduct')->name('product');
  Route::post('/addproduct', 'ProductController@setAddProduct')->name('setAddProduct');

  Route::get('/article', function () {
    return view('adminlte.article');
  })->name('article');
  Route::get('/feedback', function () {
    return view('adminlte.feedback');
  })->name('feedback');
  Route::get('/discount', function () {
    return view('adminlte.discount');
  })->name('discount');
  // Category
  Route::get('/categories', 'Categories@getAllCategory')->name('categories');
  Route::post('/addCate', 'Categories@setAddCategory')->name('setAddCategory');

  //Edit
  Route::get('/edit/{id}', 'ProductController@editproduct')->name('edit');
  Route::post('/edit{id}', 'ProductController@updateproduct')->name('updateproduct');
  Route::get('/deleteproduct/{id}', 'ProductController@deleteproduct')->name('deleteproduct');

  // Order
  Route::get('/orderadmin', 'OrderController@getOrder')->name('orderadmin');

  //User
  Route::get('/user', 'UserController@index')->name('user');
});


/** API */
// User
Route::get('/getuser', 'UserController@getUser');
// Route::get('/logout', 'UserController@getLogout');

// Product
Route::get('/getallmobile', 'ProductController@apiGetAllMobile');
Route::get('/getalllaptop', 'ProductController@apiGetAllLaptop');
Route::get('/getallheadphone', 'ProductController@apiGetAllHeadPhone');
Route::get('/getallwatch', 'ProductController@apiGetAllWatch');
Route::post('/detail', 'ProductController@getOneProduct');

// Cart
Route::post('/addtocart', "CartController@addToCart");
Route::get('/checkout/get/item', 'CartController@getCartItemForCheckout');
Route::get('/checked/get/item', 'CartController@getCartItemForChecked');
Route::post('/delete/cartitem', 'CartController@deleteCartItem');

/** Oder */
Route::post('/order', 'OrderController@postInfo');
Route::get('/getUserOrder', 'OrderController@getUserOrder');

/** PDF */
Route::get('/pdf', 'OrderController@exportPDF');

// Map
Route::get('/getmap', 'MapController@getMap');
Route::group(['prefix' => 'map'], function () {
  Route::get('/getMap', 'MapController@getMap');
  Route::get('/getprovince', 'MapController@getProvince');
  Route::get('/getdistrict', 'MapController@getDistrict');
  Route::get('/getward', 'MapController@getWard');

  Route::post('/province', 'MapController@postProvince');
  Route::post('/district', 'MapController@postDistrict');
});

/** Social Login */
Route::get('/google', function(){
  return Socialite::driver('google')->redirect();
})->name('google');
// Callback login
Route::get('/googleregister', 'SocialAuthController@loginGoogleCallback');
// Facebook
Route::get('/facebook', function(){
  return Socialite::driver('facebook')->redirect();
})->name('facebook');
// Callback login
Route::get('/facebookregister', 'SocialAuthController@loginFacebookCallback');

Route::get('/{name}', function () {
  return view('pages');
})->where('name', '.*');