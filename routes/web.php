<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

//Frontend Part
Route::get('/', 'Frontend\FrontendController@index');
Route::get('/about_us', 'Frontend\FrontendController@about_us')->name('about.us');
Route::get('/contact_us', 'Frontend\FrontendController@contact_us')->name('contact.us');
Route::get('/shopping_cart', 'Frontend\FrontendController@shopping_cart')->name('shopping.cart');
Route::post('/contact_store', 'Frontend\FrontendController@contact_store')->name('contact.store');

//BackendPart
Route::get('/home', 'Backend\HomeController@index')->name('home');
//User Management
Route::group(['prefix'=>'user', 'namespace'=>'Backend'], function (){
   Route::get('view', 'UserController@userView')->name('users_view');
   Route::get('add', 'UserController@userAdd')->name('add.user');
   Route::post('store', 'UserController@store')->name('user.store');
   Route::get('edit/{id}', 'UserController@edit')->name('user.edit');
   Route::post('update/{id}', 'UserController@update')->name('user.update');
   Route::get('delete/{id}', 'UserController@delete')->name('delete_user');
});
Route::group(['prefix'=>'profile', 'namespace'=>'Backend'], function(){
    Route::get('/view', 'ProfileController@view')->name('profile.view');
    Route::get('/edit', 'ProfileController@edit')->name('profile.edit');
    Route::post('/store', 'ProfileController@update')->name('profile.update');
    Route::get('/change/password', 'ProfileController@password_change')->name('change.password');
    Route::post('/store/password', 'ProfileController@store_password')->name('store.password');
});
Route::group(['prefix'=>'logo', 'namespace'=>'Backend'], function(){
    Route::get('/view', 'LogoController@view_logo')->name('view.logo');
    Route::get('/add', 'LogoController@add_logo')->name('add.logo');
    Route::post('/store', 'LogoController@store_logo')->name('store.logo');
    Route::get('/edit/{id}', 'LogoController@edit_logo')->name('edit.logo');
    Route::post('/update/{id}', 'LogoController@update_logo')->name('update.logo');
    Route::get('delete/{id}', 'LogoController@delete_logo')->name('delete.logo');
});

Route::group(['prefix'=>'slider', 'namespace'=>'Backend'], function(){
    Route::get('/view', 'SliderController@view_slider')->name('view.slider');
    Route::get('/add', 'SliderController@add_slider')->name('add.slider');
    Route::post('/store', 'SliderController@store_slider')->name('store.slider');
    Route::get('/edit/{id}', 'SliderController@edit_slider')->name('edit.slider');
    Route::post('/update/{id}', 'SliderController@update_slider')->name('update.slider');
    Route::get('/delete/{id}', 'SliderController@delete_slider')->name('delete.slider');
});
Route::group(['prefix'=>'contact', 'namespace'=>'Backend'], function(){
    Route::get('/view', 'ContactController@view_contact')->name('view.contact');
    Route::get('/add', 'ContactController@add_contact')->name('add.contact');
    Route::post('/store', 'ContactController@store_contact')->name('store.contact');
    Route::get('/edit/{id}', 'ContactController@edit_contact')->name('edit.contact');
    Route::post('/update/{id}', 'ContactController@update_contact')->name('update.contact');
    Route::get('/delete/{id}', 'ContactController@delete_contact')->name('delete.contact');
    Route::get('/communication_view', 'ContactController@communication_view')->name('view.communication');
    Route::get('/communication_delete/{id}', 'ContactController@communication_delete')->name('delete.communication');
});

Route::group(['prefix'=>'category', 'namespace'=>'Backend'], function(){
    Route::get('/view', 'CategoryController@view_category')->name('view_category');
    Route::get('/add', 'CategoryController@add_category')->name('add_category');
    Route::post('/store', 'CategoryController@store_category')->name('store_category');
    Route::get('/edit/{id}', 'CategoryController@edit_category')->name('edit_category');
    Route::post('/update/{id}', 'CategoryController@update_category')->name('update_category');
    Route::get('/delete/{id}', 'CategoryController@delete_category')->name('delete_category');
});
Route::group(['prefix'=>'brand', 'namespace'=>'Backend'], function(){
    Route::get('/view', 'BrandController@view_brand')->name('view_brand');
    Route::get('/add', 'BrandController@add_brand')->name('add_brand');
    Route::post('/store', 'BrandController@store_brand')->name('store_brand');
    Route::get('/edit/{id}', 'BrandController@edit_brand')->name('edit_brand');
    Route::post('/update/{id}', 'BrandController@update_brand')->name('update_brand');
    Route::get('/delete/{id}', 'BrandController@delete_brand')->name('delete_brand');
});
Route::group(['prefix'=>'color', 'namespace'=>'Backend'], function(){
    Route::get('/view', 'ColorController@view_color')->name('view_color');
    Route::get('/add', 'ColorController@add_color')->name('add_color');
    Route::post('/store', 'ColorController@store_color')->name('store_color');
    Route::get('/edit/{id}', 'ColorController@edit_color')->name('edit_color');
    Route::post('/update/{id}', 'ColorController@update_color')->name('update_color');
    Route::get('/delete/{id}', 'ColorController@delete_color')->name('delete_color');
});
Route::group(['prefix'=>'size', 'namespace'=>'Backend'], function(){
    Route::get('/view', 'SizeController@view_size')->name('view_size');
    Route::get('/add', 'SizeController@add_size')->name('add_size');
    Route::post('/store', 'SizeController@store_size')->name('store_size');
    Route::get('/edit/{id}', 'SizeController@edit_size')->name('edit_size');
    Route::post('/update/{id}', 'SizeController@update_size')->name('update_size');
    Route::get('/delete/{id}', 'SizeController@delete_size')->name('delete_size');
});
Route::group(['prefix'=>'product', 'namespace'=>'Backend'], function(){
    Route::get('/view', 'ProductController@view_product')->name('view_product');
    Route::get('/add', 'ProductController@add_product')->name('add_product');
    Route::post('/store', 'ProductController@store_product')->name('store_product');
    Route::get('/edit/{id}', 'ProductController@edit_product')->name('edit_product');
    Route::post('/update/{id}', 'ProductController@update_product')->name('update_product');
    Route::get('/delete/{id}', 'ProductController@delete_product')->name('delete_product');
    Route::get('/view/{id}', 'ProductController@show_product')->name('show_product');
});
