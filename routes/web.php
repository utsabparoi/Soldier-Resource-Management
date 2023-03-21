<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
Auth::routes(['register' => false]);
Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/', function () {
        return view('backend.page.dashboard.dashboard');
    });
    Route::post('/update-status/{table}', 'Controller@updateStatus')->name('update-status');
    //Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
