<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'WelcomeController@index')->name('welcome');

Route::get('article/{n}', 'BlogController@getarticle')->name('getArticle');
Route::get('articles','BlogController@index')->name('Articles');
Route::get('article/search/{search}/{n}',"BlogController@list");


route::get('project','ProjectController@index')->name('Project');
route::get('project/{n}','ProjectController@ShowProject');

route::get('contact','ContactController@index')->name('Contact');
route::post('contact','ContactController@store')->name('postContact');

route::get('cv', 'CVController@index')->name('CV');

/*route::get('admin/blog','Admincontroller@listArticle');
route::get('admin/blog/{n}','AdminController@modifyArticle');
route::post('admin/blog','AdminController@postArticle');*/

route::get('admin','AdminController@home')->middleware('auth');
route::get('admin/cv','AdminController@indexCV')->name('adminCV')->middleware('auth');
route::post('admin/cv','AdminController@addCV')->name('addCV')->middleware('auth');
route::put('admin/cv','AdminController@modifyCV')->name('modifyCV')->middleware('auth');
route::delete('admin/cv','AdminController@removeCV')->name('removeCV')->middleware('auth');

route::get('admin/contact','AdminController@indexContact')->middleware('auth');
route::get('admin/contact/{id}','AdminController@showmessage')->middleware('auth');

route::get('admin/project','AdminController@indexProject')->name('indexProject')->middleware('auth');
route::get('admin/project/{id}','AdminController@modifyProject')->middleware('auth');
route::get('admin/project/add','AdminController@createProject')->middleware('auth');
route::post('admin/project','AdminController@confirmCreateProject')->middleware('auth');
route::put('admin/project','AdminController@confirmModifyProject')->middleware('auth');
route::delete('admin/project/{id}','AdminController@removeProject')->middleware('auth');
route::get('admin/login','AdminController@login')->middleware('auth');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
