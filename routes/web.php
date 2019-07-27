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
});

Route::get('/login/user/', function () {
    return view('pages.user.login');
});

Route::get('/login/admin/', function () {
    return view('pages.admin.login');
});

Route::get('/login/verifikator/', function () {
    return view('pages.verifikator.login');
});

Route::get('/user/home/', function () {
    return view('pages.user.home');
});

Route::get('/verifikator/home/', function () {
    return view('pages.verifikator.home');
});

Route::get('/admin/home/', function () {
    return view('pages.admin.home');
});

Route::get('/admin/lapor/', function () {
    return view('pages.admin.lapor_bahaya');
});
Route::get('/user/lapor/', function () {
    return view('pages.user.lapor_bahaya');
});
Route::get('/verifikator/lapor/', function () {
    return view('pages.verifikator.lapor_bahaya');
});

Route::get('/admin/riwayat/', function () {
    return view('pages.admin.riwayat_pelaporan');
});

Route::get('/user/riwayat/', function () {
    return view('pages.user.riwayat_pelaporan');
});

Route::get('/verifikator/riwayat/', function () {
    return view('pages.verifikator.riwayat_pelaporan');
});
Route::get('/user/statistik/', function () {
    return view('pages.user.statistik');
});

Route::get('/admin/statistik/', function () {
    return view('pages.admin.statistik');
});

Route::get('/verifikator/statistik/', function () {
    return view('pages.verifikator.statistik');
});

Route::get('/admin/summary/', function () {
    return view('pages.admin.summary');
});
Route::get('/user/summary/', function () {
    return view('pages.user.summary');
});
Route::get('/verifikator/summary/', function () {
    return view('pages.verifikator.summary');
});
Route::get('/admin/greencard/', function () {
    return view('pages.admin.greencard');
});
Route::get('/verifikator/greencard/', function () {
    return view('pages.verifikator.greencard');
});
Route::get('/admin/man-power/', function () {
    return view('pages.admin.man_power');
});
