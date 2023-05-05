<?php

namespace App\Http\Controllers;
//use App\Http\App\Http\Controllers\UserController;
use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;


  class UsersController extends Controller

  /**
     * Create a new controller instance.
     *
     * @return void
     */

  {
   
    public function index(){

  $user = User::get()->skip(20)->take(5);
     
     
     //$user->events()->where('published', 1)->get();
     //$event = Event::where('published' '==' '1');
    //$events = Event::where('published', 1)->orderBy('id')->take(10)->get();

   return view("layouts.empty")->with('user',$user);
   //dd('$events')-toJson();
    
      
    }

    public function edit(){

     
      
      return view('users.edit');
     
 
     }

     public function show(){
     

      return view('users.show');


     }
     public function updateuser(){

     
      
      return view('users.update');
     
 
     }


     public function create(){


return view('users.create');

     }
}