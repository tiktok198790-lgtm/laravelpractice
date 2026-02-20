<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// home page = / 

// post   submit 
// get    render on screen 
// update  udpate for dynamic change        
// delete  delete


Route :: get("/about" , function (){
//    return view("main");
   return "i am about";
});



 



