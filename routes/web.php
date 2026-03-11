<?php

use Illuminate\Support\Facades\Route;
//  use App\Http\Controllers##??\UserController##??;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});




Route :: get("/about" , function (){} );
Route :: get("/users" ,  [UserController::class , "index"] );
Route :: get("/hello" ,  [UserController::class , "Hello"] );

Route::get("/home" ,  [UserController::class , "Home"] );

Route::post('/student-save', [StudentController::class,'store']);





 



