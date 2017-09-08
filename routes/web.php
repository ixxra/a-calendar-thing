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
    return Redirect::route('teamDashboard');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/home/events', 'EventController');

Route::post('/send', 'EmailController@send');

Route::get('/admin', 'AdminController@index')->name('admin');

Route::resource('/admin/users', 'UserController');

Route::get('/admin/users/{user}/delete', function(App\User $user){
    return view('admin.users.delete', ['user' => $user]); 
})->middleware('auth')->name('confirmUserDelete');


Route::get('/team-dashboard', 'TeamDashboardController@index')->name('teamDashboard');
