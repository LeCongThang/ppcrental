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
Route::group(['middleware' => 'localization', 'prefix' => Session::get('locale')], function () {
    Route::get('/', 'HomeController@Home');
    Route::get('language/{locale}','LangController@postLang');
    Route::get('/add-favorite-{id}', 'PropertyController@AddFav');
    Route::get('/favorite.html', 'PropertyController@Favorite');
    Route::get('/about-ppcrental.html', 'HomeController@About');
    Route::get('/contact-to-ppcrental.html', 'HomeController@Contact');
    Route::get('/ppcrental-news.html', 'HomeController@News');
    Route::get('/sign-in.html', 'HomeController@Signin');
    Route::get('/log-out', 'HomeController@Logout');
    Route::post('/login', 'HomeController@Login');
    Route::get('/sign-up.html', 'HomeController@Signup');
    Route::post('/register', 'HomeController@Register');
    Route::get('/ppcrental-search.html', 'HomeController@Search');
    Route::get('/for-agent.html', 'HomeController@ForAgent');
    Route::post('/search.html', 'SearchController@Search');
    Route::get('/news/{id}-{slug}.html', 'NewsController@Detail');
    Route::get('/property/{id}-{slug}.html', 'PropertyController@Detail');
    Route::get('/{id}-{slug}.html', 'PropertyController@FeatureProperty');
    Route::get('/search/{id}-{slug}.html', 'PropertyController@DistrictProperty');
    Route::get('/add-favorite-{id}.html', 'PropertyController@DistrictProperty');
    Route::get('/profile/{id}-{slug}.html', 'PropertyController@ViewProfile');
    Route::post('/send-message','HomeController@SendMessage');
    Route::post('/post-property','PropertyController@Post');
});
//================== Admin routes ================================
Route::get('/admin', 'Admin\PropertyController@Index')->middleware('not.login');
Route::get('/admin/log-in', 'Admin\AccountController@getLogin');
Route::get('/admin/log-out', 'Admin\AccountController@Logout');
Route::post('/admin/log-in', 'Admin\AccountController@postLogin');
//system config
Route::get('/admin/system-config', 'Admin\AdminController@getSystemConfig')->middleware('not.login');
Route::post('/admin/system-config', 'Admin\AdminController@updateSystemConfig')->middleware('not.login');

//system language
Route::get('/admin/system-language', 'Admin\AdminController@getLanguage')->middleware('not.login');
Route::get('/admin/create-language', 'Admin\AdminController@getCreateNewLanguage')->middleware('not.login');
Route::post('/admin/create-language', 'Admin\AdminController@postCreateNewLanguage')->middleware('not.login');
Route::get('/admin/edit-language-{id}', 'Admin\AdminController@getEditLanguage')->middleware('not.login');
Route::post('/admin/edit-language-{id}', 'Admin\AdminController@postEditLanguage')->middleware('not.login');
Route::get('/admin/delete-language-{id}', 'Admin\AdminController@getDeleteLanguage')->middleware('not.login');
Route::post('/admin/delete-language-{id}', 'Admin\AdminController@postDeleteLanguage')->middleware('not.login');
//system permission
Route::get('/admin/system-permission', 'Admin\PermissionController@Index')->middleware('not.login');
Route::get('/admin/resize-image', 'Admin\PermissionController@getResize')->middleware('not.login');
Route::post('/admin/resize-image', 'Admin\PermissionController@postResize')->middleware('not.login');

//menu management
Route::get('/admin/menu-management', 'Admin\AdminController@getMenu')->middleware('not.login');
Route::get('/admin/create-menu-{id}', 'Admin\AdminController@CreateSubmenu')->middleware('not.login');
Route::post('/admin/update-menu', 'Admin\AdminController@UpdateMenu')->middleware('not.login');
Route::get('/admin/delete-menu-{id}', 'Admin\AdminController@getDeleteMenu')->middleware('not.login');
Route::post('/admin/delete-menu-{id}', 'Admin\AdminController@postDeleteMenu')->middleware('not.login');
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
Route::get('admin/status-feature-property', 'Admin\FeatureController@Index')->middleware('not.login');
Route::post('admin/update-feature-property', 'Admin\FeatureController@Update')->middleware('not.login');
Route::get('admin/delete-feature-property-{id}', 'Admin\FeatureController@Delete')->middleware('not.login');
Route::post('admin/remove-feature-property-{id}', 'Admin\FeatureController@Remove')->middleware('not.login');
Route::get('admin/new-property-feature', 'Admin\FeatureController@Create')->middleware('not.login');


//user management
Route::get('admin/user-management', 'Admin\UserController@Index')->middleware('not.login');
Route::get('admin/edit-profile-{id}', 'Admin\UserController@EditProfile')->middleware('not.login');
Route::post('admin/update-profile-{id}', 'Admin\UserController@UpdateProfile')->middleware('not.login');
Route::get('admin/reset-password-user-{id}', 'Admin\UserController@ResetPassword')->middleware('not.login');
Route::get('admin/create-user', 'Admin\UserController@Create')->middleware('not.login');
Route::post('admin/stored-user', 'Admin\UserController@Stored')->middleware('not.login');
Route::get('admin/edit-user-{id}', 'Admin\UserController@Edit')->middleware('not.login');
Route::post('admin/update-user-{id}', 'Admin\UserController@Update')->middleware('not.login');
Route::get('admin/delete-user-{id}', 'Admin\UserController@Delete')->middleware('not.login');
Route::post('admin/remove-user-{id}', 'Admin\UserController@Remove')->middleware('not.login');
//properties management
Route::get('admin/properties-management', 'Admin\PropertyController@Index')->middleware('not.login');
Route::get('admin/new-property', 'Admin\PropertyController@Create')->middleware('not.login');
Route::post('admin/stored-property', 'Admin\PropertyController@Stored')->middleware('not.login');
Route::get('admin/load-district-{id}', 'Admin\PropertyController@LoadDistrict')->middleware('not.login');
Route::get('admin/load-ward-{id}', 'Admin\PropertyController@LoadWard')->middleware('not.login');
Route::get('admin/load-street-{id}', 'Admin\PropertyController@LoadStreet')->middleware('not.login');
Route::get('admin/edit-property-{id}', 'Admin\PropertyController@Edit')->middleware('not.login');
Route::post('admin/update-property-{id}', 'Admin\PropertyController@Update')->middleware('not.login');
Route::get('admin/delete-property-{id}', 'Admin\PropertyController@Delete')->middleware('not.login');
Route::post('admin/remove-property-{id}', 'Admin\PropertyController@Remove')->middleware('not.login');

//district in homepage
Route::get('admin/district-in-homepage', 'Admin\AdminController@DistrictInHomepage')->middleware('not.login');
Route::get('admin/update-district-home-{id}', 'Admin\AdminController@EditPosition')->middleware('not.login');
Route::post('admin/edit-position-{id}', 'Admin\AdminController@UpdatePosition')->middleware('not.login');
Route::get('admin/district-detail-{id}', 'Admin\AdminController@DistrictDetail')->middleware('not.login');
