<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/



Route::get('admin', 'Admin\AdminController@index');
Route::get('admin/give-role-permissions', 'Admin\AdminController@getGiveRolePermissions');
Route::post('admin/give-role-permissions', 'Admin\AdminController@postGiveRolePermissions');
Route::resource('admin/roles', 'Admin\RolesController');
Route::resource('admin/permissions', 'Admin\PermissionsController');
Route::resource('admin/users', 'Admin\UsersController');
Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/book', 'HomeController@book')->name('book');
Route::post('/book/save', 'HomeController@bookSave');
Route::get('/book/delete/{id}', 'HomeController@bookDelete');
Route::get('/page/{id}', 'HomeController@page');

Route::resource('admin/cost', 'Admin\\CostController');
Route::resource('admin/pages/pages', 'Admin\\PagesController');
Route::resource('admin/passengers/passengers', 'Admin\\PassengersController');
Route::resource('admin/tickets/tickets', 'Admin\\TicketsController');