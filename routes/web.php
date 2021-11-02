<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\UserController;
use app\Http\Controllers\RegistroController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/registros', function () {
    return view('registros');
})->name('registros');

Route::middleware(['auth:sanctum', 'verified'])->get('/import', function () {
    return view('import');
})->name('import');

Route::middleware(['auth:sanctum', 'verified'])->get('/importData', function () {
    return view('importData');
})->name('importData');

Route::middleware(['auth:sanctum', 'verified'])->get('/Exportar', function () {
    return view('Exportar');
})->name('Exportar');
//Route::get('user-list-pdf', 'UserController@exportpdf')->name('user.pdf');
//excel
//Route::get('/livewire/import', 'RegistroController@import')->name('/livewire/import');
//Route::post('/livewire/importData', 'RegistroController@importData')->name('/livewire/importData');
