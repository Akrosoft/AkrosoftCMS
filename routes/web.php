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


Auth::routes();

// Configuration Setting Route
Route::get('/akrosoft-cms', 'ConfigurationController@index');

// Site Routes
Route::get('/', 'PagesController@index');

// Authenticated Admins Routes
Route::prefix('manager')->group(function() {
    Route::get('/profile', 'AdminsController@adminUserProfile')->name('manager.profile');
    Route::get('/email-compose', 'AdminsController@composeEmail')->name('manager.email-compose');
    Route::get('/email-templates', 'AdminsController@emailTemplates')->name('manager.email-templates');
    Route::get('/contact-list', 'AdminsController@contactList')->name('manager.contact-list');
    Route::post('/upload-attributes-image', 'AdminsController@handleUploadAttributeImage');
    Route::delete('/site-attributes', 'AdminsController@handleSiteAttributeDeleteRequest');
    Route::put('/site-attributes', 'AdminsController@handleSiteAttributeUpdateRequest');
    Route::post('/site-attributes', 'AdminsController@addAttributes')->name('manager.attributes.submit');
    Route::get('/site-attributes', 'AdminsController@attributes')->name('manager.attributes');
    Route::get('/content-categories', 'AdminsController@contentCategories')->name('manager.content-categories');
    Route::get('/contents', 'AdminsController@contents')->name('manager.contents');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminsController@index')->name('admin.dashboard');
});

// // Authenticated Users Routes
Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', 'UsersController@index')->name('dashboard');
});