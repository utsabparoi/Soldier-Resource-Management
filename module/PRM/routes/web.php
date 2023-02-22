<?php

// namespace Module\PRM\routes;

use Illuminate\Support\Facades\Route;
use Module\PRM\Controllers\CampController;

Route::group(['midleware'=>'auth', 'prefix' =>'prm','as' => 'prm.'], function(){
    /* ===========================
        Camp Routes List
    =============================*/
    Route::resource('camp', CampController::class);
    Route::get('assign-camp', [CampController::class, 'assign_camp'])->name('assign-camp');
    // Route::post('/update-status/{table}', 'Controller@updateStatus')->name('update-status');
});
