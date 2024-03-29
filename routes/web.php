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

Route::get('/', 'PagesController@index');
Route::post('/questions/search', 'QuestionsController@indexSearch');
Route::resource('questions', 'QuestionsController');
Route::resource('comments', 'CommentsController');
Route::resource('images', 'ImagesController');
Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('ajaxRequest', 'AjaxController@ajaxRequest');
Route::post('ajaxRequest', 'AjaxController@ajaxRequestPost')->name('ajaxRequest.post');