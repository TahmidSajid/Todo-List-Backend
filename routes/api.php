<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


Route::prefix('task')->name('task.')->controller(TaskController::class)->group(function(){
    Route::get('index','index')->name('index');
});
