<?php

// namespace Module\PRM\routes;

use Illuminate\Support\Facades\Route;
use Module\PRM\Controllers\APRController;
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
use Module\PRM\Controllers\ParadeCampMigrateController;

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

    Route::resource('parade-migrate', ParadeCampMigrateController::class);
    Route::get('parade-camp-migrate', [ParadeCampMigrateController::class, 'manualCampMigrate'])->name('parade-camp-migrate');
    Route::get('bulk-camp-migrate', [ParadeCampMigrateController::class, 'bulkCampMigrate'])->name('bulk-camp-migrate');
    Route::post('bulk-import',[ParadeCampMigrateController::class, 'bulkDataStore'])->name('bulk-import');



    Route::get('/get-current-camp', [ParadeCampMigrateController::class, 'currentCamp'])->name('current-camp');


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

    //Store
    Route::resource('store', StoreController::class);

    //Soldier
    Route::resource('parade', ParadeController::class);
    Route::get('/paradeProfile/{id}', [ParadeController::class, 'paradeProfile'])->name('paradeProfile');
    Route::get('/export_parade_csv', [ParadeController::class, 'exportExcelCSV'])->name('export_parade_csv');
    Route::get('/export_parade_pdf', [ParadeController::class, 'exportPDF'])->name('export_parade_pdf');

    // Soldier Course Routes
    Route::resource('parade-courses', ParadeCourseController::class);
    Route::get('assign-course', [ParadeCourseController::class, 'assign_course'])->name('assign-course');
    Route::get('/get-unmatched-course', [ParadeCourseController::class, 'unmatched_course']);
    Route::get('/get-taken-course', [ParadeCourseController::class, 'taken_course']);

    //APR
    Route::resource('apr', APRController::class);

});
//ajax axios routes
Route::post('/camp_store', [StoreController::class, 'getCampStore']);
Route::post('/parade_search', [ParadeController::class, 'getParadeSearch']);
Route::get('/clear_image', [StoreController::class, 'imageUnlink']);


