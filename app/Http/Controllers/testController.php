<?php

 namespace App\Http\Controllers;
 use Illuminate\Http\Request;
 use App\Models\student;

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

    return view('add',['message' => $message]);


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









}
