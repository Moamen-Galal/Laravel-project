<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('lang/{lang}',function ($lang){

       if($lang == 'ar'){
           session()->put('lang','ar');
       }else{
        session()->put('lang','en');
       }

       return back();
});



Route::get('/', function () {
    return view('welcome');
});


Route::get('Message',function (){

    echo "welcome ahmed to our laravel site ";
});





Route::post('postForm',function(){

    echo 'from data';

});

     
// Route::get('user/{id}/{name?}',function($id ){
//          echo 'user id'.$id;
//    })->where('id','[0-9]+');



Route::get('user/{id}',function($id ){
         echo 'user id'.$id;
   });



   Route::get('admin/{id}',function($id ){
    echo 'Admin id'.$id;
});


// controller routes ....


Route::get('addUser',function (){
    return view('add');
});

Route::get('ControllerMessage','testController@printMessage');
Route::get('display','testController@display')->middleware('auth');
Route::get('delete/{id}','testController@deleteStudent');
Route::get('show/{id}','testController@show');
Route::post('edit','testController@editdata');





Route::get('studentSignUp','testController@signup');
Route::post('storeStudent','testController@storeData');

Route::get('studentLogin','testController@signIn');
Route::post('dologinStudent','testController@login');

Route::get('logoutStudent','testController@logout');



















Route::resource('user','userController');

// user  >>> dislay index .    (get)
// user/create  >>> call create function 
// user  >>> store .    (post)
// user/{id}/edit   >> show single data 
// user/id   >>> edit
// user/destroy   >>> delete 
 


//  Route::get('signIn',function (){

//     return view('login');
//  });

 Route::get('signIn','userController@signIn')->name('signIn');

 Route::post('login','userController@login');
 Route::get('logout','userController@logout');

 




 Route::get('stdData',function (){
     return view('studentData');
 })->middleware('student');







// Route::middleware(['lang'])->group(function (){
   


// });








/*
  
  - get      .
  - post     .
  - put      .  
  - delete   .
  - resource .
  - patch
  - match
  - any    
  - option 
*/






