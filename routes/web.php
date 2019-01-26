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

// Route::get('send_test_email', function(){
//     try {
//         $result = Mail::raw('Sending emails with Mailgun and Laravel is easy!', function($message) {
//             $message->subject('Akrosoft CMS email test');
//             $message->from('no-reply@akrosoft.site', 'Akrosoft CMS');
//             $message->to('akugbeode@gmail.com');
//         });
        
        
//         dd($result);
        
//     } catch (\Exception $e) {
//         dd($e);
//     }
	
// });

Auth::routes();

// Configuration Setting Route
Route::get('/akrosoft-cms', 'ConfigurationController@index');

// Site Routes
Route::get('/', 'PagesController@index');
Route::get('/contact-us', 'PagesController@contactGetRequest');
Route::post('/contact-us', 'PagesController@contactPostRequest');
Route::post('/send-test-email', 'AdminsController@sendTestEmail');

// Authenticated Admins Routes
Route::prefix('manager')->group(function() {
    Route::put('/contact/reply-message', 'AdminsController@handleReplyContactMessage');
    Route::put('/update-logged-user-details', 'AdminsController@updateLoggedUserProfileDetails');
    Route::put('/update-password', 'AdminsController@updateLoggedUserPassword');
    Route::post('/update-password', 'AdminsController@authenticateLoggedUser');
    Route::post('/add-user-social-media-account', 'AdminsController@addUserSocialMediaAccount');
    Route::get('/profile', 'AdminsController@adminUserProfile')->name('manager.profile');
    Route::get('/email-compose', 'AdminsController@composeEmail')->name('manager.email-compose');
    Route::post('/email-compose', 'AdminsController@sendComposedEmail')->name('manager.send-composed-email');
    Route::get('/email-templates', 'AdminsController@emailTemplates')->name('manager.email-templates');
    Route::post('/email-templates', 'AdminsController@storeEmailTemplates')->name('manager.store-email-templates');
    Route::get('/contact-list', 'AdminsController@contactList')->name('manager.contact-list');
    Route::post('/upload-image', 'AdminsController@handleUploadImage');
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