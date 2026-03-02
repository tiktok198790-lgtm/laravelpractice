<?php

use Illuminate\Support\Facades\Route;
//  use App\Http\Controllers##??\UserController##??;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/users', [UserController::class, 'index']);



// home page = / 

// post   submit 
// get    render on screen 
// update  udpate for dynamic change        
// delete  delete


Route :: get("/about" , function (){} );

Route :: get("/users" ,  [UserController::class , "index"] );
Route :: get("/hello" ,  [UserController::class , "Hello"] );

// Route :: get("/home" ,  [UserController::class , "Home"] );
Route :: get("/home" ,  [UserController::class , "ageVerfication"] );





 



