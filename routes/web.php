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

//Rutas para el Front End
Route::get('/', [
    'as' => 'front.index',
    'uses' => 'FrontController@index'
]);

Route::get('categories/{name}', [
    'uses' => 'FrontController@searchCategory',
    'as' => 'front.search.category'
]);

Route::get('tags/{name}', [
    'uses' => 'FrontController@searchTag',
    'as' => 'front.search.tag'
]);

Route::get('articles/{slug}', [
    'uses' => 'FrontController@viewArticle',

    'as' => 'front.view.article'
]);

//Rutas para el Back End
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

    Route::get('/', ['as' => 'admin.index', function () {
        return view('admin.index');
    }]);

    Route::group(['middleware' => 'admin'], function(){
        Route::resource('users', 'UsersController');
        Route::get('users/{id}/destroy', [
            'uses' => 'UsersController@destroy',
            'as' => 'admin.users.destroy'
        ]);
    });

    Route::resource('categories', 'CategoriesController');
    Route::get('categories/{id}/destroy', [
        'uses' => 'CategoriesController@destroy',
        'as' => 'admin.categories.destroy'
    ]);

    Route::resource('tags', 'TagsController');
    Route::get('tags/{id}/destroy', [
        'uses' => 'TagsController@destroy',
        'as' => 'admin.tags.destroy'
    ]);

    Route::resource('articles', 'ArticlesController');
    Route::get('articles/{id}/destroy', [
        'uses' => 'ArticlesController@destroy',
        'as' => 'admin.articles.destroy'
    ]);

    Route::get('images', [
        'uses' => 'ImagesController@index',
        'as' => 'admin.images.index'
    ]);

   // Route::get('profile', 'UsersController@profile');

    Route::get('users/{id}/profile', [
            'uses' => 'UsersController@profile',
            'as' => 'admin.users.profile'
        ]);

    Route::post('profile', 'UsersController@update_avatar');

});


// Rutas de autenticacion...
Route::get('admin/auth/login', [
    'uses' => 'Auth\LoginController@showLoginForm',
    'as' => 'admin.auth.login'
 ]);

 Route::post('admin/auth/login', [
    'uses' => 'Auth\LoginController@login',
    'as' => 'admin.auth.login'
 ]);

 Route::get('admin/auth/logout', [
    'uses' => 'Auth\LoginController@logout',
    'as' => 'admin.auth.logout'
 ]);

// Rutas para restablecer contraseñas...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Rutas de verificacion de email...
if ($options['verify'] ?? false) {
    $this->emailVerification();
}
