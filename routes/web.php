<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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
    Route::post('/home/admin/update', [HomeController::class, 'admin_update'])->name('admin_update');
    Route::get('/home/admin/info', [HomeController::class, 'user_index'])->name('user_index');

    //user
    Route::get('/user',[UserController::class, "User"])->name("user");
    Route::get('/createUserForm',[UserController::class, "CreateUserForm"])->name("createUserForm");
    Route::post('/createUser',[UserController::class, "CreateUser"])->name("createUser");
    Route::get('/editUserForm/{id}',[UserController::class, "EditUserForm"])->name("editUserFrom");
    Route::post('/updateUser/{id}',[UserController::class, "UserUpdate"])->name("userUpdate");
    Route::get('/userDelete/{id}',[UserController::class, "UserDelete"])->name("deleteUser");

    //Dashboard all routes
    Route::get('/state-information/{id}',[HomeController::class, "state_info"])->name('state-information');
});
