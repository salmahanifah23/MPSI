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

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@index')->name('Admin.home');
Route::get('/mahasiswa', 'MahasiswaController@index')->name('Mahasiswa.home');

Route::get('/mahasiswa/list','MahasiswaController@list')->name('list');
Route::get('/mahasiswa/tambahide', 'MahasiswaController@tambahide')->name('bidang');
Route::get('/mahasiswa/tambahide/{id}', 'MahasiswaController@pilihdosbing')->name('dosbing');
Route::post('/mahasiswa/store','MahasiswaController@storeide')->name('storeide');

// Route::resource('/mahasiswa', 'MahasiswaController')->only(['list', 'tambahide', 'storeide']);


Route::get('/dosen', 'DosenController@index')->name('Dosen.home');

Route::resource('user', 'UserController');
Route::get('dataTableUSer', 'UserController@dataTable')->name('dataTableUser');

Route::get('/logina', function(){
    return view('login.login');
})->name('login');
Route::post('/masuk', 'loginController@login')->name('masuk');
Route::get('/keluar', 'loginController@logout')->name('keluar');

