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
Route::get('/about-ppcrental.html','HomeController@About');
Route::get('/contact-to-ppcrental.html','HomeController@Contact');
Route::get('/ppcrental-news.html','HomeController@News');
Route::get('/sign-in.html','HomeController@Signin');
Route::get('/sign-up.html','HomeController@Signup');
Route::get('/ppcrental-residential.html','HomeController@Residential');
Route::get('/ppcrental-commercial.html','HomeController@Commercial');
Route::get('/ppcrental-sale.html','HomeController@Sale');
Route::get('/ppcrental-search.html','HomeController@Search');
Route::get('/for-agent.html','HomeController@ForAgent');
//================== Admin routes ================================
Route::get('/admin','Admin\AdminController@Home')->middleware('not.login');
Route::get('/admin/log-in','Admin\AccountController@getLogin');
Route::get('/admin/log-out','Admin\AccountController@Logout');
Route::post('/admin/log-in','Admin\AccountController@postLogin');
//system config
Route::get('/admin/system-config','Admin\AdminController@getSystemConfig')->middleware('not.login');
Route::post('/admin/system-config','Admin\AdminController@updateSystemConfig')->middleware('not.login');

//system language
Route::get('/admin/system-language','Admin\AdminController@getLanguage')->middleware('not.login');
Route::get('/admin/create-language','Admin\AdminController@getCreateNewLanguage')->middleware('not.login');
Route::post('/admin/create-language','Admin\AdminController@postCreateNewLanguage')->middleware('not.login');
Route::get('/admin/edit-language-{id}','Admin\AdminController@getEditLanguage')->middleware('not.login');
Route::post('/admin/edit-language-{id}','Admin\AdminController@postEditLanguage')->middleware('not.login');
Route::get('/admin/delete-language-{id}','Admin\AdminController@getDeleteLanguage')->middleware('not.login');
Route::post('/admin/delete-language-{id}','Admin\AdminController@postDeleteLanguage')->middleware('not.login');
//system permission
Route::get('/admin/system-permission','Admin\PermissionController@Index')->middleware('not.login');
Route::get('/admin/resize-image','Admin\PermissionController@getResize')->middleware('not.login');
Route::post('/admin/resize-image','Admin\PermissionController@postResize')->middleware('not.login');

//menu management
Route::get('/admin/menu-management', 'Admin\AdminController@getMenu')->middleware('not.login');
Route::get('/admin/create-menu-{id}', 'Admin\AdminController@CreateSubmenu')->middleware('not.login');
Route::post('/admin/update-menu', 'Admin\AdminController@UpdateMenu')->middleware('not.login');
Route::get('/admin/delete-menu-{id}','Admin\AdminController@getDeleteMenu')->middleware('not.login');
Route::post('/admin/delete-menu-{id}','Admin\AdminController@postDeleteMenu')->middleware('not.login');
// about management
Route::get('/admin/about-management', 'Admin\AboutController@Index')->middleware('not.login');
Route::post('/admin/about-management', 'Admin\AboutController@Update')->middleware('not.login');
//contact management
Route::get('/admin/contact-management', 'Admin\ContactsController@Index')->middleware('not.login');
//slider management
Route::get('/admin/slider-management', 'Admin\SliderController@Index')->middleware('not.login');
Route::get('/admin/new-slider', 'Admin\SliderController@NewSlider')->middleware('not.login');
Route::post('/admin/stored-slider', 'Admin\SliderController@Stored')->middleware('not.login');
Route::get('/admin/edit-slider-{id}', 'Admin\SliderController@EditSlider')->middleware('not.login');
Route::post('/admin/update-slider-{id}', 'Admin\SliderController@Update')->middleware('not.login');
Route::get('/admin/delete-slider-{id}', 'Admin\SliderController@DeleteSlider')->middleware('not.login');
Route::post('/admin/remove-slider-{id}', 'Admin\SliderController@Delete')->middleware('not.login');
//news management
Route::get('/admin/news-management', 'Admin\NewsController@Index')->middleware('not.login');
Route::get('/admin/create-news', 'Admin\NewsController@Create')->middleware('not.login');
Route::post('/admin/stored-news', 'Admin\NewsController@Stored')->middleware('not.login');
Route::get('/admin/edit-news-{id}', 'Admin\NewsController@Edit')->middleware('not.login');
Route::post('/admin/update-news-{id}', 'Admin\NewsController@Update')->middleware('not.login');
Route::get('/admin/delete-news-{id}', 'Admin\NewsController@DeleteNews')->middleware('not.login');
Route::post('/admin/remove-news-{id}', 'Admin\NewsController@Delete')->middleware('not.login');
//property feature management
Route::get('admin/status-feature-property','Admin\FeatureController@Index')->middleware('not.login');
Route::post('admin/update-feature-property','Admin\FeatureController@Update')->middleware('not.login');
Route::get('admin/delete-feature-property-{id}','Admin\FeatureController@Delete')->middleware('not.login');
Route::post('admin/remove-feature-property-{id}','Admin\FeatureController@Remove')->middleware('not.login');
Route::get('admin/new-property-feature','Admin\FeatureController@Create')->middleware('not.login');


//user management
Route::get('admin/user-management','Admin\UserController@Index')->middleware('not.login');
Route::get('admin/reset_password-user-{id}','Admin\UserController@ResetPassword')->middleware('not.login');
Route::get('admin/create-user','Admin\UserController@Create')->middleware('not.login');
Route::post('admin/stored-user','Admin\UserController@Stored')->middleware('not.login');
Route::get('admin/edit-user-{id}','Admin\UserController@Edit')->middleware('not.login');
Route::post('admin/update-user-{id}','Admin\UserController@Update')->middleware('not.login');
Route::get('admin/delete-user-{id}','Admin\UserController@Delete')->middleware('not.login');
Route::post('admin/remove-user-{id}','Admin\UserController@Remove')->middleware('not.login');
 //properties management

