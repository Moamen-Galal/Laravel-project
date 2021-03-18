<?php

 namespace App\Http\Controllers;
 use Illuminate\Http\Request;
 use App\Models\student;
 use Auth;

class testController extends Controller
{
    //
    
    public function printMessage(){
//["name" =>  "Mohammed" , "age" => 23 , "email" => "test@nti.com"]
// with('name','ahmed');
// compact()


// $name  = "abdelkareem";
// $age   = 23;
    // $email = "test@nti.com";
    //compact('name','age','email')

        return view('message',["name" =>  "Mohammed" , "age" => 23 , "email" => "test@nti.com"]);
    }




    public function storeData(Request $request){

         $data =   $this->validate(request(),
           [
              'name'     => 'required|min:5|max:50', 
              'email'    => 'required|email',
              'password' => 'required|min:5',
           ]
        );

      $data['password']  = bcrypt($data['password']);
    
      // ['name' => $data['name'] , 'email' => $data['email'],'password' => bcrypt($data['password']) ]
     
    $op = student::create($data);

    $message = '';
   if($op){
               $message = "your data inserted";
   }else{
               $message ='try again';
    }

    return view('registerStudent',['message' => $message]);


    }





   public function display(){

      $data =  student::get()->toArray();        //all()
      // paginate()
      return view('display',['data' => $data]);
   }


  public function deleteStudent($id){
     
        $op =  student::where('id',$id)->delete();
     
        if($op){
             return back();
          }else{
              echo 'error try again';
         }

  }



  public function show($id){    

     $data = student::find($id);

     return view('edit',['studentData' => $data]);
      

  }




    public function editdata(Request $request){
      // logic
      $data =   $this->validate(request(),
      [
         'name'     => 'required|min:5|max:50', 
         'email'    => 'required|email'
      ]
   );


      $op =   student::where('id',$request->id)->update(['name' => $request->name , 'email' => $request->email]);

     if($op){
        return  redirect(url('/display'));
     }else{
        echo 'error in delete';
     }


    }





    public function signup(){
      return view("registerStudent");
  }






    public function signIn(){
      if(!auth()->guard('student')->check()){

      return view("loginstudent");
      }else{
         return view('studentData');
      }
  }


  
  public function login(Request $request){
     
      $data =   $this->validate(request(),
      [
          'email'    => 'required|email',
          'password' => 'required|min:5',
       ]
    );


       if( Auth::guard('student')->attempt($data,true)){
    
        // return view('studentData');


        return redirect('stdData');
       }else{
      return redirect(url('studentLogin'));
       }


  }


  

  public function logout(){
   
      auth()->guard('student')->logout();

      return redirect(url('signIn'));
  }














/***
 *      Api's . . .  
 ***/
 
public function loadStusentsApi(){
    $data =  student::get();
    return response()->json(['data' => $data],200);
}



public function storeDataApi(Request $request){


//    $data =   $this->validate(request(),
//      [
//         'name'     => 'required|min:5|max:50', 
//         'email'    => 'required|email',
//         'password' => 'required|min:5',
//      ]
//   );

// $data['password']  = bcrypt($data['password']);



// ['name' => $data['name'] , 'email' => $data['email'],'password' => bcrypt($data['password']) ]

$op = student::create(['name' => $request->name,'email' => $request->email , 'password' => bcrypt($request->password)]);

$message = '';
if($op){
         $message = "your data inserted";
}else{
         $message ='try again';
}

return response()->json(['message' => $message],200);


}






}
