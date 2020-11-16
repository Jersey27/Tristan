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

Route::get('blog/{n}', 'ArticleController@getarticle')->name('getBlog');
Route::get('blog','ArticleController@index')->name('Blog');

route::get('project','ProjectController@index')->name('Project');
route::get('project/{n}','ProjectController@ShowProject');

route::get('contact','ContactController@index')->name('Contact');
route::post('contact','ContactController@store')->name('postContact');

route::get('cv', 'CVController@index')->name('CV');


route::group(["prefix"=>"admin","namespace"=>"Admin"],function() {
    route::get('/','AdminHomeController@home')->name('HomeAdmin')->middleware('auth');
    route::put('/','AdminHomeController@modifyHome')->name('modifyHome')->middleware('auth');

    route::get('cv','AdminCVController@indexCV')->name('adminCV')->middleware('auth');
    route::post('cv','AdminCVController@addCV')->name('addCV')->middleware('auth');
    route::put('cv','AdminCVController@modifyCV')->name('modifyCV')->middleware('auth');
    route::delete('cv','AdminCVController@removeCV')->name('removeCV')->middleware('auth');

    route::get('blog','AdminArticlecontroller@index')->name('adminBlog')->middleware('auth');
    route::get('blog/add','AdminArticleController@newArticle')->name('newBlog')->middleware('auth');
    route::get('blog/{n}','AdminArticleController@modifyArticle')->name('modifyBlog')->middleware('auth');
    route::post('blog','AdminArticleController@postNewArticle')->name('postNewBlog')->middleware('auth');
    route::put('blog','AdminArticleController@postArticle')->name('postBlog')->middleware('auth');
    route::delete('blog','AdminArticleController@removeArticle')->name('removeBlog')->middleware('auth');

    route::get('project','AdminProjectController@indexProject')->name('indexProject')->middleware('auth');
    route::get('project/{id}','AdminProjectController@modifyProject')->middleware('auth');
    route::get('project/add','AdminProjectController@createProject')->middleware('auth');
    route::post('project','AdminProjectController@confirmCreateProject')->middleware('auth');
    route::put('project','AdminProjectController@confirmModifyProject')->middleware('auth');
    route::delete('project/{id}','AdminProjectController@removeProject')->middleware('auth');

    route::get('contact','AdminContactController@indexContact')->middleware('auth');
    route::get('contact/{id}','AdminContactController@showmessage')->middleware('auth');
    route::get('login','AdminContactController@login')->middleware('auth');
});
Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
