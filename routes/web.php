<?php

use App\Http\Livewire\CrudIndex;
use App\Http\Livewire\CrudModal\Artikel;
use App\Http\Livewire\Home;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('home', Home::class)->name('home');

Route::get('crud-livewire', CrudIndex::class)->name('crud-livewire');

Route::get('crud-modal', Artikel::class);
