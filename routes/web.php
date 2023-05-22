<?php

use App\Http\Controllers\CookieController;
use App\Http\Controllers\RequestController;
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

Route::get('/check_user', [CookieController::class, 'check']);
Route::post('/save_data', [RequestController::class, 'save']);

Route::get('/', function () {
    return view('app');
});

