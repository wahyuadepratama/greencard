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
Route::group(['middleware' => ['auth', 'authUser']], function () {
  Route::get('/user/home/', 'User\DashboardController@index');

  Route::get('/user/lapor/', 'User\DangerReportController@index');
  Route::post('/user/lapor', 'User\DangerReportController@store');

  Route::get('/user/riwayat/', 'User\HistoryReportController@index');
  Route::post('/user/riwayat/open/data/search', 'User\HistoryReportController@searchOpenHistory');
  Route::post('/user/riwayat/close/data/search', 'User\HistoryReportController@searchCloseHistory');
  Route::post('/user/riwayat/open/data/mobile/search', 'User\HistoryReportController@searchOpenHistoryMobile');
  Route::post('/user/riwayat/close/data/mobile/search', 'User\HistoryReportController@searchCloseHistoryMobile');
  Route::post('/user/section/modal', 'User\HistoryReportController@loadModal');

  Route::get('/user/statistik/', 'User\StatistikController@index');

  Route::get('/user/summary/', 'User\SummaryController@index');
  Route::get('/user/summary/report/export/excel/{year}/{month}', 'User\SummaryController@exportToExcel');
  Route::get('/user/summary/report/export/pdf/{year}/{month}', 'User\SummaryController@exportToPDF');
});

/*
 --------------- Admin Route disini ------------------
*/
Route::get('/login/admin/', 'Auth\LoginController@loginFormAdmin');
Route::group(['middleware' => ['auth', 'authAdmin']], function () {
  Route::get('/admin/home/', 'Admin\DashboardController@index');

  Route::get('/admin/lapor/', 'Admin\DangerReportController@index');
  Route::post('/admin/lapor/', 'Admin\DangerReportController@store');

  Route::get('/admin/riwayat/', 'Admin\HistoryReportController@index');
  Route::post('/riwayat/open/data/search', 'Admin\HistoryReportController@searchOpenHistory');
  Route::post('/riwayat/close/data/search', 'Admin\HistoryReportController@searchCloseHistory');
  Route::post('/riwayat/open/data/mobile/search', 'Admin\HistoryReportController@searchOpenHistoryMobile');
  Route::post('/riwayat/close/data/mobile/search', 'Admin\HistoryReportController@searchCloseHistoryMobile');
  Route::post('/section/modal', 'Admin\HistoryReportController@loadModal');

  Route::get('/admin/statistik/', 'Admin\StatistikController@index');

  Route::get('/admin/summary/', 'Admin\SummaryController@index');
  Route::get('/admin/summary/report/export/excel/{year}/{month}', 'Admin\SummaryController@exportToExcel');
  Route::get('/admin/summary/report/export/pdf/{year}/{month}', 'Admin\SummaryController@exportToPDF');

  Route::get('/admin/greencard/', 'Admin\GreencardController@index');
  Route::post('/greencard/open/data/search', 'Admin\GreencardController@searchOpenHistory');
  Route::post('/greencard/close/data/search', 'Admin\GreencardController@searchCloseHistory');
  Route::post('/greencard/open/data/mobile/search', 'Admin\GreencardController@searchOpenHistoryMobile');
  Route::post('/greencard/close/data/mobile/search', 'Admin\GreencardController@searchCloseHistoryMobile');
  Route::post('/greencard/change-status', 'Admin\GreencardController@changeStatus');

  Route::get('/greencard/report/destroy/{id}', 'Admin\GreencardController@destroyReport');
  Route::post('/greencard/report/update/{id}', 'Admin\GreencardController@updateReport');

  Route::get('/admin/man-power/', 'Admin\ManPowerController@index');
  Route::post('/admin/man-power/store', 'Admin\ManPowerController@store');
  Route::get('/admin/man-power/search/{input}', 'Admin\ManPowerController@search');
  Route::post('/admin/man-power/load-all-data', 'Admin\ManPowerController@loadAllData');
  Route::post('/admin/man-power/load-all-data/mobile', 'Admin\ManPowerController@loadAllDataMobile');
  Route::post('/admin/man-power/destroy', 'Admin\ManPowerController@destroy');
  Route::post('/admin/man-power/update', 'Admin\ManPowerController@update');
});

/*
 ---------------- Verifikator Route disini -----------------
*/
Route::get('/login/verifikator/', 'Auth\LoginController@loginFormVerifikator');
Route::group(['middleware' => ['auth', 'authVerifikator']], function () {
  Route::get('/verifikator/home/', 'Verifikator\DashboardController@index');

  Route::get('/verifikator/lapor/', 'Verifikator\DangerReportController@index');
  Route::post('/verifikator/lapor/', 'Verifikator\DangerReportController@store');

  Route::get('/verifikator/riwayat/', 'Verifikator\HistoryController@index');
  Route::post('/verifikator/riwayat/open/data/search', 'Verifikator\HistoryController@searchOpenHistory');
  Route::post('/verifikator/riwayat/close/data/search', 'Verifikator\HistoryController@searchCloseHistory');
  Route::post('/verifikator/riwayat/open/data/mobile/search', 'Verifikator\HistoryController@searchOpenHistoryMobile');
  Route::post('/verifikator/riwayat/close/data/mobile/search', 'Verifikator\HistoryController@searchCloseHistoryMobile');
  Route::post('/verifikator/section/modal', 'Verifikator\HistoryController@loadModal');

  Route::get('/verifikator/statistik/', 'Verifikator\StatistikController@index');

  Route::get('/verifikator/summary/', 'Verifikator\SummaryController@index');
  Route::get('/verifikator/summary/report/export/excel/{year}/{month}', 'Verifikator\SummaryController@exportToExcel');
  Route::get('/verifikator/summary/report/export/pdf/{year}/{month}', 'Verifikator\SummaryController@exportToPDF');

  Route::get('/verifikator/greencard/', 'Verifikator\GreencardController@index');
  Route::post('/verifikator/greencard/open/data/search', 'Verifikator\GreencardController@searchOpenHistory');
  Route::post('/verifikator/greencard/close/data/search', 'Verifikator\GreencardController@searchCloseHistory');
  Route::post('/verifikator/greencard/open/data/mobile/search', 'Verifikator\GreencardController@searchOpenHistoryMobile');
  Route::post('/verifikator/greencard/close/data/mobile/search', 'Verifikator\GreencardController@searchCloseHistoryMobile');
  Route::post('/verifikator/greencard/change-status', 'Verifikator\GreencardController@changeStatus');
});
