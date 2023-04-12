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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','LandingPage\HomeController@index')->name('beranda');
Route::get('/perusahaan','LandingPage\HomeController@perusahaan')->name('perusahaan');
Route::get('/layanan','LandingPage\HomeController@layanan')->name('layanan');
Route::get('/layanan/detail/{id}','LandingPage\HomeController@layanan_detail')->name('layanan.detail');
Route::get('/proyek','LandingPage\HomeController@proyek')->name('proyek');
Route::get('/proyek/detail/{id}','LandingPage\HomeController@proyek_detail')->name('proyek.detail');
Route::get('/blog','LandingPage\HomeController@blog')->name('blog');
Route::get('/kontak','LandingPage\HomeController@kontak')->name('kontak');
Route::post('/kontak-kami','LandingPage\HomeController@kontak_kami')->name('kontak-kami');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Auth::routes(['register' => false, 'login' => false]);

Route::get('/login','Auth\MamiClean\LoginController@showLoginForm')->name('mami-clean.login');
Route::post('/login', 'Auth\MamiClean\LoginController@login')->name('mami-clean.login.submit');
Route::get('/logout', 'Auth\MamiClean\LoginController@logout')->name('mami-clean.logout');

Route::group(['middleware' => 'auth:mami_clean'], function(){
    @include('mami-clean.php');
});
