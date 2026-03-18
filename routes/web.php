<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CourseController::class, 'index'])->name('courses');
Route::get('/create', [CourseController::class, 'create'])->name('createcourse');
Route::post('/create', [CourseController::class, 'store'])->name('storecourse');
Route::post('/edit/{id}', [CourseController::class, 'edit'])->name('editcourse');
