<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
// use App\Http\Controllers\BiodataController;
use App\Http\Controllers\PunishmentController;
use App\Http\Controllers\AssignCourseController;
use App\Http\Controllers\LeaveApplicationController;

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
    return view('backend.page.dashboard.dashboard');
})->middleware("AdminLogin");
Route::get('/Login', [AdminController::class, 'LoginForm']);
Route::post('/login',[AdminController::class, "Login"]);
Route::get('/logout',[AdminController::class, "Logout"]);

/*=======================
    update-status route
=========================*/
Route::post('/update-status/{table}', 'Controller@updateStatus')->name('update-status');


