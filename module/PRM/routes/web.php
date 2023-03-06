<?php

// namespace Module\PRM\routes;

use Illuminate\Support\Facades\Route;
use Module\PRM\Controllers\CampController;
use Module\PRM\Controllers\StoreController;
use Module\PRM\Controllers\CourseController;
use Module\PRM\Controllers\ParadeController;
use Module\PRM\Controllers\TrainingController;
use Module\PRM\Controllers\ParadeCourseController;
use Module\PRM\Controllers\LeaveCategoryController;
use Module\PRM\Controllers\LeaveApplicationController;
use Module\PRM\Controllers\TrainingCategoryController;
use Module\PRM\Controllers\AppointmentHolderController;

Route::group(['midleware'=>'AdminLogin', 'prefix' =>'prm','as' => 'prm.'], function(){
    /* ===========================
        Leave-Category Routes List
    =============================*/
    Route::resource('leave-category', LeaveCategoryController::class);
    /* ===========================
        LeaveApplication Routes List
    =============================*/
    Route::resource('leave-applications', LeaveApplicationController::class);
    /* ===========================
        Camp Routes List
    =============================*/
    Route::resource('camp', CampController::class);
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
    Route::get('/get-unmatched-course', [CourseController::class, 'unmatched_course'])->name('unmatched-course');

    //Store
    Route::resource('store', StoreController::class);

    //Parade
    Route::resource('parade', ParadeController::class);
    Route::get('/paradeProfile/{id}', [ParadeController::class, 'paradeProfile'])->name('paradeProfile');

    // Parade Course Routes
    Route::resource('parade-courses', ParadeCourseController::class);

});
//ajax axios routes
Route::post('/camp_store', [StoreController::class, 'getCampStore']);


