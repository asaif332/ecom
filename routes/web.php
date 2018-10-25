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


// Route :: get('/' , 'FrontController@index')->name('home');

// Route:: get('/cart/remove/{id}' , 'FrontController@remove_cart_item')->name('remove.item.cart');
// Route:: get('/decr_cart_item/{id}' , 'FrontController@decr_cart_item')->name('decr.item.cart');
// Route:: get('/incr_cart_item/{id}' , 'FrontController@incr_cart_item')->name('incr.item.cart');
// Route:: get('/add_to_cart/{id}' , 'FrontController@add_to_cart')->name('add.cart');
// Route:: get('/detail/{id}' , 'FrontController@detail')->name('detail');
// Route:: get('/category/{id}' , 'FrontController@category')->name('category');
// Route :: get('/basket' , 'FrontController@basket')->name('basket');
// Route :: get('/customer/register' , 'FrontController@register')->name('customer.register');
// Route :: post('/customer/add' , 'FrontController@register_user')->name('customer.add');
//
//
//
// Route :: middleware(['user'])->group(function () {
//   Route:: post('/cart/checkout' , 'FrontController@checkout')->name('cart.checkout');
// });
Auth::routes();
Route :: middleware(['auth'])->group(function () {

  Route :: get('/profile' , 'ProfileController@index')->name('profile');
  Route :: get('/profile/edit' , 'ProfileController@edit')->name('profile.edit');
  Route :: post('/profile/update' , 'ProfileController@update')->name('profile.update');

  Route :: prefix('admin')->middleware(['admin'])->group(function (){
    Route::get('/', 'AdminController@index')->name('admin');
    Route :: post('/subcat/store' , 'CategoriesController@subcat_store')->name('categories.subcategory.store');
    Route :: resource('users' , 'UsersController');
    Route :: resource('categories' , 'CategoriesController');
    Route :: resource('brands' , 'BrandsController');
    Route :: get('/product/cat/delete/{product_id}/{category_id}' , 'ProductsController@product_cat_delete')->name('product.category.delete');
    Route :: resource('products' , 'ProductsController');
  });
});

Route :: get('/{path}' , function () {
  return view('welcome');
})->where('path' , '.*');

// Route :: fallback(function() {
//   return view('welcome');
// });
