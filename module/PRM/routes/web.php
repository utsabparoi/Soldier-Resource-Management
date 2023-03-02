<?php

// namespace Module\PRM\routes;

use Illuminate\Support\Facades\Route;
use Module\PRM\Controllers\CampController;
use Module\PRM\Controllers\CourseController;
use Module\PRM\Controllers\ParadeController;
use Module\PRM\Controllers\StoreController;
use Module\PRM\Controllers\TrainingController;
use Module\PRM\Controllers\LeaveCategoryController;
use Module\PRM\Controllers\TrainingCategoryController;
use Module\PRM\Controllers\AppointmentHolderController;

Route::group(['midleware'=>'auth', 'prefix' =>'prm','as' => 'prm.'], function(){
    /* ===========================
        Leave-Category Routes List
    =============================*/
    Route::resource('leave-category', LeaveCategoryController::class);

    /* ===========================
        Camp Routes List
    =============================*/
    Route::resource('camp', CampController::class);
    Route::get('assign-camp', [CampController::class, 'assign_camp'])->name('assign-camp');
    /* ================================
        Appointment Holder Routes List
    ===================================*/
    Route::resource('appointment-holder', AppointmentHolderController::class);

    /* ===========================
        Training-Category Routes List
    =============================*/
    Route::resource('training-category', TrainingCategoryController::class);

    /* ===========================
        Training Routes List
    =============================*/
    Route::resource('training', TrainingController::class);

    /* ===========================
        Course Routes List
    =============================*/
    Route::resource('course', CourseController::class);
    Route::get('assign-course', [CourseController::class, 'assign_course'])->name('assign-course');

    //Store
    Route::resource('store', StoreController::class);

    //Parade
    Route::resource('parade', ParadeController::class);
    Route::get('/paradeProfile/{id}', [ParadeController::class, 'paradeProfile'])->name('paradeProfile');


});
//ajax axios routes
Route::post('/camp_store', [StoreController::class, 'getCampStore']);
Route::post('/profileStatusChange', [StoreController::class, 'getCampStore']);

