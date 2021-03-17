<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
// use Auth;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

      echo 'hi from resource controller . . .';


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

      return view('Register');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data =   $this->validate(request(),
        [
            'name'     => 'required|min:5|max:50', 
            'email'    => 'required|email',
            'password' => 'required|min:5',
         ]
      );

    $data['password']  = bcrypt($data['password']);

    $op = User::create($data);

    $message = '';
  if($op){

             echo 'register done';
        //     $message = "your data inserted";
     }else{
            // $message ='try again';
         echo 'error try again';
        }

       ///return view('add',['message' => $message]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }




    public function signIn(){
        return view("login");
    }


    
    public function login(Request $request){
       
        $data =   $this->validate(request(),
        [
            'email'    => 'required|email',
            'password' => 'required|min:5',
         ]
      );
          // rememmber me  >>> true || false
         
         if( auth()->attempt($data,true)){
            return redirect(url('display'));

         }else{
             return redirect(url('signIn'));
         }


    }


    

    public function logout(){
     
        auth()->logout();

        return redirect(url('signIn'));
    }





}
