<?php

use Illuminate\Support\Facades\Route;
use Laravel\Dusk\Http\Controllers\UserController;
use App\Http\Controllers\UserssController;
use App\Models\User;

/*s
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/welcome','App\Http\Controllers\WelcomeController@index');
Route::get('/users', [UsersController::class,'index']);

Route::get('/','App\Http\Controllers\UsersController@index');
Route::get('users/index','App\Http\Controllers\UsersController@index')->name('users.index');
Route::get('users/edit','App\Http\Controllers\UsersController@edit')->name('users.edit');
Route::get('users/update','App\Http\Controllers\UsersController@updateuser')->name('users.updateuser');
Route::get('users/show','App\Http\Controllers\UsersController@show')->name('users.show');
Route::get('users/create','App\Http\Controllers\UsersController@create');
Route::get('auth/login','App\Http\Controllers\LoginController@index');
Route::resource('users','App\Http\Controllers\UsersController');
Route::get('/allusers', function () {
    return User::paginate();
    });

    
Route::get('/getskip20',function()

{
 
    $user = User::get()->skip(20)->take(5);

return view("layouts.empty")->with('user',$user);

});
Route::get('/getskip30',function(){
 
    $user = User::get()->skip(100)->take(15);

return view("layouts.empty")->with('user',$user);

});

Route::get('/userwithevents',function(){
 
    $user = User::findorfail(3341);


        dd($user)->with('events');




});

//Route::get('/users', 'App\Http\Controllers\UserController@index');
//  Route::get('/users/{user}', function (User $user) {
//     return  $user->first_name;
//     });

// Route::get('/users/{user}',function(User $user){


// return $user->toJson();

// });

// Route::get('/users/{user}', function (User $user) {
//     return  $user->email;
//     });
   
    Route::get('/users.index', function (User $user) {
        return  view('users.index',$user);
        });
     
        Route::get('/users/{user}', function () {

           
echo route('users.index', ['users' => 1]);
         })->name('users.index');
 
            










Route::get('/getall_users',function(){
   // return  view('users.index',['users' => User::all()]);

  // $event = Event::all();
   return App\Models\User::get();
  
  });

  Route::get('/findall_users',function($id){
   // return  view('users.index',['users' => User::all()]);
         return App\Models\User::findwithOutfail($id);
  
  });


 Route::get('getall_events',function(Event $event){
     
     return App\Models\Event::get();
   
 });


