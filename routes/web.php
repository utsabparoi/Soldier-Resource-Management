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
/* ===========================
    Route List with middleware
=============================*/
// Route::group(['middleware'=> 'AdminLogin', 'prefix' => 'prm', 'as' => 'prm.'], function () {
//     Route::resource('biodata', BiodataController::class);
//     Route::resource('course', CourseController::class);
//     Route::resource('assignCourse', AssignCourseController::class);
//     Route::resource('leaveApplication', LeaveApplicationController::class);
//     Route::resource('punishment', PunishmentController::class);

// });

// Route::get('/biodataExtraInformation', [BiodataController::class, 'addExtraInformation'])->name('biodataExtraInformation')->middleware("AdminLogin");
// Route::get('/singleBiodata/{id}', [BiodataController::class, 'singleBiodata'])->name('singleBiodata')->middleware("AdminLogin");
// Route::get('/confirmBiodata', [BiodataController::class, 'confirmBiodata'])->name('confirmBiodata')->middleware("AdminLogin");
// Route::get('/searchEmployee',  function () {
//     return view('backend.feature.searchEmployee');
// })->name('searchEmployee')->middleware("AdminLogin");

Route::post('/update-status/{table}', 'Controller@updateStatus')->name('update-status');


