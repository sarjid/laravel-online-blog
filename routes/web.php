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

// Route::get('/', function () {
//     return view('pages.index');
// });

Route::get('/','HelloController@index');
// ==============pages are here ==============
Route::get('contct/us','HelloController@contact')->name('contact');
Route::get('about/us','hellocontroller@about')->name('about');

// ==============catergory are here ==============
Route::get('all/cat', 'BoloController@allcategory')->name('all.category');
Route::get('add/cat','BoloController@addCategory')->name('add.category');
Route::post('store/category','BoloController@storeCategory')->name('store.category');
Route::get('category/view/{id}','boloController@viewCat');
Route::get('category/delete/{id}', 'boloController@deleteCat');
Route::get('edit/cat/{id}', 'boloController@editCat');
Route::post('update/category/{id}', 'boloController@updateCat');

// crud post wil  be go here
Route::get('write/post','postController@writePost')->name('write.post');
Route::post('store/post', 'postController@storePost')->name('store.post');
Route::get('all/post', 'postController@allPost')->name('all.post');
Route::get('post/view/{id}','postController@viewpost');
Route::get('edit/post/{id}','postController@editPost');
Route::post('update/post/{id}','postController@updatePost');
Route::get('post/delete/{id}','postController@deletePost');



