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


route::get('project/page/{n}','ProjectController@ListProject');
route::get('project/{n}','ProjectController@ShowProject');

route::get('contact','ContactController@index')->name('Contact');
route::post('contact','ContactController@store')->name('postContact');

route::get('cv', 'CVController@index')->name('CV');

/*route::get('admin/blog','Admincontroller@listArticle');
route::get('admin/blog/{n}','AdminController@modifyArticle');
route::post('admin/blog','AdminController@postArticle');*/

route::get('admin','AdminController@home');
route::get('admin/cv','AdminController@indexCV')->name('adminCV');
route::post('admin/cv','AdminController@modifyCV')->name('adminpostCV');
route::get('admin/contact','AdminController@indexContact');
route::get('admin/contact/{id}','AdminController@showmessage');
/*route::get('admin/project','AdminController@listProject');
route::get('admin/project/{n}','Admincontroller@modifyProject');
route::post('admin/project','AdminController@postProject');
route::get('admin/login','AdminController@login');



Route::get('/home', 'HomeController@index')->name('home');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');*/
