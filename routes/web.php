<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;

Route::get('/', [UserController::class , "index"]);

// Route :: get("/users" ,  [UserController::class , "index"] );

// Route :: get("/hello" ,  [UserController::class , "Hello"] );

Route::get("/home" ,  [StudentController::class , "getData"]);

Route::post('/student-save', [StudentController::class,'store']);

Route::delete('/delete/{id}', [StudentController::class, 'destroy'])->name('user.delete');

Route::get('/student/{id}/edit', [StudentController::class, 'edit'])->name('student.edit');

Route::post('/student/{id}/update', [StudentController::class, 'update'])->name('student.update');






 



