<?php

use App\Http\Controllers\AssignCourseController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LeaveApplicationController;
use App\Http\Controllers\PunishmentController;
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
    return view('backend.page.dashboard.dashboard');
});
Route::group([ 'prefix' => 'website-cms', 'as' => 'website.'], function () {
        Route::resource('biodata', BiodataController::class);
        Route::resource('course', CourseController::class);
        Route::resource('assignCourse', AssignCourseController::class);
        Route::resource('leaveApplication', LeaveApplicationController::class);
        Route::resource('punishment', PunishmentController::class);
});
Route::get('/biodataExtraInformation', [BiodataController::class, 'addExtraInformation'])->name('biodataExtraInformation');
Route::get('/singleBiodata/{id}', [BiodataController::class, 'singleBiodata'])->name('singleBiodata');
Route::get('/confirmBiodata', [BiodataController::class, 'confirmBiodata'])->name('confirmBiodata');
Route::get('/searchEmployee',  function () {
    return view('backend.feature.searchEmployee');
})->name('searchEmployee');
