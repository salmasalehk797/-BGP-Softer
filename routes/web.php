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

 Route::get('/', function () {
    return view('welcome');
 });

//Route::get('/', 'pagescontroller@home');
Route::get('/templates', 'pagescontroller@templates');
Route::get('/services', 'pagescontroller@services');
Route::get('/createwebsite', 'pagescontroller@createwebsite');
Route::get('/createapp', 'pagescontroller@createapp');
Route::get('/domainhosting', 'pagescontroller@domainhosting');
Route::get('/programs', 'pagescontroller@programs');
Route::get('/about', 'pagescontroller@about');
Route::get('/contact', 'pagescontroller@contact');
Route::get('/signup', 'pagescontroller@signup');
Route::get('/dashboard', 'pagescontroller@dashboard');
Route::get('/myprojects', 'pagescontroller@myprojects');
Route::get('/streaming-blogging', 'pagescontroller@streaming');

Route::get('/projects/{id}', function($id){
	return App::call('App\Http\Controllers\pagescontroller@single_project',['id' => $id]);
});
Route::get('/projects/{id}/feedback', function($id){
	return App::call('App\Http\Controllers\pagescontroller@feedback',['id' => $id]);
});
Route::get('/projects/{id}/requestchange', function($id){
	return App::call('App\Http\Controllers\pagescontroller@requestchange',['id' => $id]);
});

Route::post('/projects/{id}/edit', [
    'uses' => 'ReportsController@store'
]);
Route::post('/projects/{id}', [
    'uses' => 'projectscontroller@mail'
]);
Route::put('/dashboard', [
    'uses' => 'ReportsController@update'
]);
Route::put('/projects', [
    'uses' => 'projectscontroller@update'
]);

Auth::routes();
// Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('projects','projectscontroller');
Route::resource('users','UsersController');
Route::resource('example','ExamplesController');

Route::get('/delete', function ($project) {
	return App::call('App\Http\Controllers\projectscontroller@mail',['project' => $project]);
   
    
});