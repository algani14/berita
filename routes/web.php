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


//relasi
Route::get('penulis', function(){
    $penulis = \App\User::find(1);

    foreach($penulis->artikel as $data){
        echo 'Judul = $data->judul<br>';
        echo 'Deskripsi = $data->deskripsi<br>';
        echo 'Slug = $data->slug<br>';
        echo '<hr>';
    }
});

use App\Mahasiswa;
use App\Dosen;
use App\Wali;
use App\Hobi;

Route::get('relasi-1', function() {

		# Temukan mahasiswa dengan NIM 1010101
		$mahasiswa = Mahasiswa::where('nim', '=', '1010101')->first();

		# Tampilkan nama wali mahasiswa
		return $mahasiswa->wali->nama;

    });

Route::get('relasi-2', function() {

		# Temukan mahasiswa dengan NIM 10101
		$mahasiswa = Mahasiswa::where('nim', '=', '1010101')->first();

		# Tampilkan nama dosen pembimbing
		return $mahasiswa->dosen->nama;

	});

Route::get('relasi-3', function() {

		# Temukan dosen dengan yang bernama abdul
		$dosen = Dosen::where('nama', '=', 'Abdul')->first();

		# Tampilkan seluruh data mahasiswa didikannya
		foreach ($dosen->mahasiswa as $temp)
			echo '<li> Nama : ' . $temp->nama . ' <strong>' . $temp->nim . '</strong></li>';
    });

Route::get('relasi-4', function() {

		# Bila kita ingin melihat hobi saya
		$novay = Mahasiswa::where('nama', '=', 'Al')->first();

		# Tampilkan seluruh hobi si novay
		foreach ($novay->hobi as $temp)
			echo '<li>' . $temp->hobi . '</li>';
	});

Route::get('relasi-5', function() {

		# Temukan hobi Mandi Hujan
		$novay = Hobi::where('hobi', '=', 'Mandi Hujan')->first();

		# Tampilkan semua mahasiswa yang punya hobi mandi hujan
		foreach ($novay->mahasiswa as $temp)
			echo '<li> Nama : ' . $temp->nama . ' <strong>' . $temp->nim . '</strong></li>';

	});


Route::resource('siswa' , 'SiswaController');
Route::get('tabungan/report' , 'TabunganController@jumlah_tabungan');
Route::resource('tabungan' , 'TabunganController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
