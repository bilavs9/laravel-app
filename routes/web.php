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

Route::group(['namespace'=>'frontend'],function () {
    Route::any('/','ApplicationController@index');
})
;Route::group(['namespace'=>'cms'],function () {
    Route::any('login','UserController@login')->name('login');
    Route::any('logout','UserController@logout')->name('logout');
    Route::any('register','UserController@register')->name('register');
});


Route::group(['namespace'=>'cms','prefix'=>Config::get('admin.admin_name'),'middleware'=>'auth'],function (){
    Route::any('/','AdminController@index')->name('admin');
/*
|---------------------------------------------------------------------------
|Users Routes
|---------------------------------------------------------------------------
*/
Route::group(['prefix'=>'users','middleware'=>'privilege_check'],function(){
        Route::any('/','UserController@index')->name('users');
        Route::any('add_user','UserController@addUser')->name('add_user');
        Route::any('delete_user/{user_id?}','UserController@deleteUser')->name('delete_user');
        Route::any('edit_user/{user_id?}','UserController@editUser')->name('edit_user');
        Route::any('edit_user_action','UserController@editUserAction')->name('edit_user_action');
        Route::any('update_status','UserController@updateStatus')->name('update_status');
        Route::any('update_active_status/{user_id?}','UserController@updateActiveStatus')->name('active_status');
        Route::any('update_inactive_status/{user_id?}','UserController@updateinActiveStatus')->name('inactive_status');
    });
/*
|---------------------------------------------------------------------------
|Gallery Routes
|---------------------------------------------------------------------------
*/
Route::group(['prefix'=>'gallery'],function() {
            Route::any('/','GalleryController@index')->name('show_gallery');
            Route::any('add_gallery','GalleryController@addGallery')->name('add_gallery');
            Route::any('edit_gallery/{user_id?}','GalleryController@editGallery')->name('edit_gallery');
            Route::any('delete_gallery/{user_id?}','GalleryController@deleteGallery')->name('delete_gallery');
            Route::any('edit_gallery_action','GalleryController@editGalleryAction')->name('edit_gallery_action');
        });
/*
|---------------------------------------------------------------------------
|Menu Routes
|---------------------------------------------------------------------------
*/

Route::group(['prefix'=>'menu'],function() {
          Route::any('/','MenuController@index')->name('show_menu');
          Route::any('add_menu','MenuController@addMenu')->name('add_menu');
          Route::any('edit_menu/{user_id?}','MenuController@editMenu')->name('edit_menu');
          Route::any('delete_menu/{user_id?}','MenuController@deleteMenu')->name('delete_menu');
          Route::any('edit_menu_action','MenuController@editMenuAction')->name('edit_menu_action');
        });

/*
|---------------------------------------------------------------------------
|News Routes
|---------------------------------------------------------------------------
*/
Route::group(['prefix'=>'news'],function() {
    Route::any('/','NewsController@index')->name('show_news');
    Route::any('add_news','NewsController@addNews')->name('add_news');
    Route::any('edit_news/{user_id?}','NewsController@editNews')->name('edit_news');
    Route::any('delete_news/{user_id?}','NewsController@deleteNews')->name('delete_news');
    Route::any('edit_news_action','NewsController@editNewsAction')->name('edit_news_action');
    Route::any('update_news_activestatus/{user_id?}','NewsController@updateActiveStatus')->name('active_status');
    Route::any('update_news_inactivestatus/{user_id?}','NewsController@updateInactiveStatus')->name('inactive_status');

});

Route::group(['prefix'=>'notices'],function() {
    Route::any('/','NoticesController@index')->name('notices');
    Route::any('add_notices','NoticesController@addNotices')->name('add_notices');
});


});
