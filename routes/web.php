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
