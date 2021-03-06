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
})->name('front');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/logout', 'Auth\LoginController@userlogout')->name('user.logout');



Route::prefix('admin')->group(function()
{
     Route::get('/', 'AdminController@index')->name('admin.dashboard');
     Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
     Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
     Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');
     Route::post('/register', 'Auth\AdminregisterController@register')->name('admin.register.submit');
     Route::get('/register', 'Auth\AdminregisterController@showRegistrationForm')->name('admin.register');


    Route::get('/daily','DailyController@index')->name('daily');
    Route::post('/daily/routine','DailyController@store')->name('daily.store');
    Route::get('/daily/routine','DailyController@create')->name('daily.create');
    Route::delete('/daily/delete/{id}','DailyController@destroy')->name('daily.destroy');
    Route::put('/daily/update/{id}','DailyController@update')->name('daily.update');
    Route::get('daily/edit/{id}','DailyController@edit')->name('daily.edit');
    Route::get('daily/truncate','DailyController@remove')->name('daily.truncate');






    Route::post('/create','RoutineController@store')->name('routine.store');
	Route::get('/create','RoutineController@create')->name('routine.create');
	Route::delete('/delete/{id}','RoutineController@destroy')->name('routine.destroy');
	Route::put('/update/{id}','RoutineController@update')->name('routine.update');
	Route::get('/edit/{id}','RoutineController@edit')->name('routine.edit');
    Route::get('routine/truncate','RoutineController@remove')->name('routine.truncate');








    Route::get('/file','FileController@index')->name('file');
    Route::get('/file/create','FileController@create')->name('file.create');
    Route::post('/file/create','FileController@store')->name('file.store');
	Route::delete('file/delete/{id}','FileController@destroy')->name('file.destroy');
    Route::get('file/truncate','FileController@remove')->name('file.truncate');






	Route::get('/question','QuestionController@index')->name('question');
	Route::get('question/create','QuestionController@create')->name('question.create');
	Route::post('question/create','QuestionController@store')->name('question.store');
	Route::delete('question/delete/{id}','QuestionController@destroy')->name('question.destroy');
    Route::get('question/truncate','QuestionController@remove')->name('question.truncate');
});



Route::get('/main','studentcontroller@index')->name('main');
Route::get('/examples','studentcontroller@examples')->name('examples');
Route::get('/page','studentcontroller@page')->name('page');
Route::get('/another_page','studentcontroller@another_page')->name('another_page');
Route::get('/contact','studentcontroller@contact')->name('contact');
Route::get('/page/file/{file}','DownloadController@download')->name('downloadfile');
Route::get('/another_page/question/{file}','DownloadController@qdownload')->name('qdownloadfile');

