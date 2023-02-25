<?php

// namespace Module\PRM\routes;

use Illuminate\Support\Facades\Route;
use Module\PRM\Controllers\CampController;
use Module\PRM\Controllers\CourseController;
use Module\PRM\Controllers\TrainingController;
use Module\PRM\Controllers\AppointmentHolderController;

Route::group(['midleware'=>'auth', 'prefix' =>'prm','as' => 'prm.'], function(){
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
        Training Routes List
    =============================*/
    Route::resource('training', TrainingController::class);

    /* ===========================
        Course Routes List
    =============================*/
    Route::resource('course', CourseController::class);
    Route::get('assign-course', [CourseController::class, 'assign_course'])->name('assign-course');
});
