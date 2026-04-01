<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
  public function index(){
    return view('welcome');
   
  }

   public function Hello(){
    // return view('welcome');
    return "hello";
  }

     public function Home(){
    return view('student');
    // return "home";
  }

    public function ageVerfication(){
      for($i = 0 ; $i < 10 ; $i++){
        
      }
     $arr = ["ahmed" , "bilawal" , "ayan"]; 
    return view('Home' , compact("arr"));
    // return "hello";
  }

    

}
