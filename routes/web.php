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

Route::get('/', function () { return redirect('/login/user/'); });
Route::get('/user', function () { return redirect('/login/user/'); });
Route::get('/verifikator', function () { return redirect('/login/verifikator/'); });
Route::get('/admin', function () { return redirect('/login/admin/'); });

Route::get('/login', function () { return redirect('/login/user/'); });
Route::post('/login',  'Auth\LoginController@login')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

 /*
  ---------------- User Route disini --------------------
 */
Route::get('/login/user/', 'Auth\LoginController@loginFormUser');
Route::group(['middleware' => ['auth']], function () {
  Route::get('/user/home/', 'User\DashboardController@index');
  Route::get('/user/lapor/', 'User\DangerReportController@index');
  Route::get('/user/riwayat/', 'User\HistoryReportController@index');
  Route::get('/user/statistik/', 'User\StatistikController@index');
  Route::get('/user/summary/', 'User\SummaryController@index');
});

/*
 --------------- Admin Route disini ------------------
*/
Route::get('/login/admin/', 'Auth\LoginController@loginFormAdmin');
Route::group(['middleware' => ['auth']], function () {
  Route::get('/admin/home/', 'Admin\DashboardController@index');
  Route::get('/admin/lapor/', 'Admin\DangerReportController@index');
  Route::get('/admin/riwayat/', 'Admin\HistoryReportController@index');
  Route::get('/admin/statistik/', 'Admin\StatistikController@index');
  Route::get('/admin/summary/', 'Admin\SummaryController@index');
  Route::get('/admin/greencard/', 'Admin\GreencardController@index');
  Route::get('/admin/man-power/', 'Admin\ManPowerController@index');
});

/*
 ---------------- Verifikator Route disini -----------------
*/
Route::get('/login/verifikator/', 'Auth\LoginController@loginFormVerifikator');
Route::group(['middleware' => ['auth']], function () {
  Route::get('/verifikator/home/', 'Verifikator\DashboardController@index');
  Route::get('/verifikator/lapor/', 'Verifikator\DangerReportController@index');
  Route::get('/verifikator/riwayat/', 'Verifikator\HistoryController@index');
  Route::get('/verifikator/statistik/', 'Verifikator\StatistikController@index');
  Route::get('/verifikator/summary/', 'Verifikator\SummaryController@index');
  Route::get('/verifikator/greencard/', 'Verifikator\GreencardController@index');
});
