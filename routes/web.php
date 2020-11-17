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
    return redirect()->route('login');
});
Route::group(['middleware' => 'auth'],function(){
    Route::get('home',function(){
        if(auth()->user()->roles->role === 'admin' || auth()->user()->roles->role === 'petugas'){
            return redirect()->route('adminOrPetugas.dashboard');
        }else if(auth()->user()->roles->role === 'masyarakat'){
            return redirect()->route('masyarakat.home');
        }
    })->name('home');
    Route::group(['middleware' => 'admin'],function(){
        Route::group(['prefix' => 'user'],function(){
            Route::get('','UserController@index')->name('user.index');
            Route::get('/masyarakat/create','UserController@create')->name('user.masyarakat.create');
            Route::post('/masyarakat/create','UserController@masyarakat')->name('user.masyarakat.store');
            Route::get('/petugas/create','UserController@petugasCreate')->name('user.petugas.create');
            Route::post('/petugas/create','UserController@petugas')->name('user.petugas.store');
            Route::get('/masyarakat/edit/{id}','UserController@showMasyarakat')->name('user.masyarakat.show');
            Route::patch('/masyarakat/edit/{id}','UserController@editMasyarakat')->name('user.masyarakat.edit');
            Route::get('/petugas/edit/{id}','UserController@showPetugas')->name('user.petugas.show');
            Route::patch('/petugas/edit/{id}','UserController@editPetugas')->name('user.petugas.edit');
            Route::delete('/masyarakat/delete/{id}','UserController@destroyMasyarakat')->name('user.masyarakat.destroy');
            Route::delete('/petugas/delete/{id}','UserController@destroyPetugas')->name('user.petugas.destroy');
        });
    
        Route::group(['prefix' => 'generate-laporan'],function(){
            Route::get('all','GenerateLaporanController@all')->name('generateLaporan.all');
            Route::get('tolak','GenerateLaporanController@tolak')->name('generateLaporan.tolak');
            Route::get('proses','GenerateLaporanController@proses')->name('generateLaporan.proses');
            Route::get('terima','GenerateLaporanController@terima')->name('generateLaporan.terima');
            Route::get('all/cetak-pdf','GenerateLaporanController@cetak_pdf_all')->name('generateLaporan.all.pdf');
            Route::get('tolak/cetak-pdf','GenerateLaporanController@cetak_pdf_tolak')->name('generateLaporan.tolak.pdf');
            Route::get('terima/cetak-pdf','GenerateLaporanController@cetak_pdf_terima')->name('generateLaporan.terima.pdf');
            Route::get('proses/cetak-pdf','GenerateLaporanController@cetak_pdf_proses')->name('generateLaporan.all.proses');
            Route::get('{id}/cetak-pdf','GenerateLaporanController@cetak_pdf_select')->name('generateLaporan.all.select.pdf');
        });
    });
    
    Route::group(['middleware' => 'adminOrPetugas'],function(){
        Route::get('tanggapan','TanggapanController@index')->name('adminOrPetugas.tanggapan.index');
        Route::post('tanggapan/{id}','TanggapanController@store')->name('adminOrPetugas.tanggapan.store');
        Route::patch('tanggapan/{id}','TanggapanController@tolak')->name('adminOrPetugas.tanggapan.tolak');
        Route::get('/user/profile','ProfileController@index')->name('adminOrPetugas.profile.index');
        Route::get('/user/profile/edit','ProfileController@show')->name('adminOrPetugas.profile.show');
        Route::patch('/user/profile/edit','ProfileController@edit')->name('adminOrPetugas.profile.edit');
        Route::get('dashboard','DashboardController@index')->name('adminOrPetugas.dashboard');
    });
    
    Route::group(['prefix' => 'masyarakat','middleware' => 'masyarakat'],function(){
        Route::get('','Masyarakat\HomeController@index')->name('masyarakat.home');
        Route::post('','Masyarakat\HomeController@store')->name('masyarakat.home.store');
        Route::get('pengaduan','Masyarakat\AduanController@index')->name('masyarakat.pengaduan.index');
        Route::get('profile','Masyarakat\ProfileController@index')->name('masyarakat.profile.index');
        Route::get('profile/edit','Masyarakat\ProfileController@show')->name('masyarakat.profile.show');
        Route::patch('profile/edit','Masyarakat\ProfileController@edit')->name('masyarakat.profile.edit');
    });
});

Route::get('register','Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register','Auth\RegisterController@create');
Route::get('login','Auth\LoginController@showLoginForm')->name('login');
Route::post('login','Auth\LoginController@login');
Route::post('logout','Auth\LoginController@logout')->name('logout');