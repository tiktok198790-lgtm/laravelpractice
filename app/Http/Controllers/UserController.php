<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
  public function index(){
    // return view('welcome');
    return "hi i am user page";
  }

   public function Hello(){
    // return view('welcome');
    return "hello";
  }

     public function Home(){
    return view('Home');
    // return "home";
  }

    public function ageVerfication(){
      
    return view('Home' ,[ "age" => 10] );
    // return "hello";
  }

    

}
