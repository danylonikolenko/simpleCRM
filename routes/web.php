<?php

use App\Http\Livewire\Clients;
use App\Http\Livewire\Companies;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('dashboard');
})->name('dashboard');



Route::middleware(['auth:sanctum', 'verified'])->get('/companies', Companies::class)->name('companies');
Route::middleware(['auth:sanctum', 'verified'])->get('/clients', Clients::class)->name('clients');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/get_companies', 'App\Http\Controllers\ApiController@getCompanies');
Route::get('/get_clients/{id}', 'App\Http\Controllers\ApiController@getClients');
Route::get('/get_client_company/{id}', 'App\Http\Controllers\ApiController@getClientCompany');

