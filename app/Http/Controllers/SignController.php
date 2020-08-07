<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Session;

class SignController extends Controller
{
    //
 public function index()
 {
   
    $levels = DB::select('select * from levels');
    $depts=DB::select('select * from depts where name != "general"');
    $array=[    
      'levels'=>$levels,
      'depts'=>$depts
    ];
    return view('signup',$array);
 }


   public function fetch($id)
    {
       /*
        $depts=DB::select('select id,name from depts_levels 
        inner join depts
        on dep_id=id
         where level_id= ?', [$id]);
*/
         $depts = DB::table('depts_levels')
         ->join('depts', 'depts_levels.dep_id', '=', 'depts.id')
         ->where('depts_levels.level_id',$id)
         ->select('depts.id', 'depts.name')
         ->get()
         ->pluck('name','id');
      
      return $depts;
   
    }

public function home()
{
  if(Session::has('type') )
  {
 if(Session::get('type')=='student')
   {
     return redirect()->route('student.home');
   }
   else if(Session::get('type')=='prof'){
    return redirect()->route('prof.home');
   }
   else if(Session::get('type')=='admin'){
    return redirect()->route('admin.home');
   }
  }
  else{
    return view('welcome');
  }
}





    public function signupStudent(Request $request)
    {
      /*  $this->validate(request(), [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'level_id' => 'required',
            'dep_id' => 'required',
        ]);
        
      
        
        auth()->login($user);
        
        return redirect()->to('/games');*/
        $this->validation($request);
        $request['password']=bcrypt($request->password);
        $user = DB::insert('
        insert into students
       (fname,lname,email
       ,password,
        level_id,dep_id) 
        values (?, ?,?,?,?,?)',
         [$request->fname,$request->lname,$request->email,
         $request->password,
         $request->level,$request->dep]);
        return redirect()->route('login')->with('status','you are registered');
        //return $request->all();
    }

    public function validation($request)
    {
     return $this->validate($request,[
         'fname' => 'required|max:255',
         'lname' => 'required',
         'email' => 'required|email|unique:students',
         'password' => 'required|confirmed',
         'level' => 'required',
         'dep' => 'required',

     ]);
    }


    public function signupProf(Request $request)
    {
        $this->validate(request(), [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'dep_id' => 'required',
        ]);
        
      
        
       
       
        $request['password']=bcrypt($request->password);
        $user = DB::insert('
        insert into professors
       (fname,lname,email
       ,password,
       dep_id) 
        values (?, ?,?,?,?)',
         [$request->fname,$request->lname,$request->email,
         $request->password,
        $request->dep_id]);
        return redirect()->route('login')->with('status','you are registered <br>
         just log in to confirm');
        //return $request->all();
    }

   



























    
    public function showLoginForm()
 {
   
   /* $levels = DB::select('select * from levels');
    $depts=DB::select('select * from depts where name != "general"');
    $array=[    
      'levels'=>$levels,
      'depts'=>$depts
    ];*/
    return view('login');
 }


 public function loginStudent(Request $request)
 {
    $this->validate($request,[
    
      'email' => 'required|email',
      'password' => 'required',
  ]);
 
 $student= DB::select('
  select * from students
  where email = ?',
  [$request->email]);
  
  $student= DB::table('students')
  ->where('email',$request->email)
  ->first();
 $password= Hash::check($request->password, $student->password);


if($student && $password)
{

  
 $request->session()->put('user', $student);
 $request->session()->put('type', 'student');
 $student=$request->session()->get('user');

return redirect()->route('student.home');;
 //$s= $request->session()->get('user');
  //dd($s->fName);
 // return redirect()->route('');
}
else if($student==null){
  return redirect()->route('login')->with('error','email not valid');;
}
else if($password==null){
  return redirect()->route('login')->with('error','password not valid');
}
  /*if(FacadesAuth::attempt(['email' => $request->email, 'password' => $request->password]))
    //return 'logged in succifully';
 {
   return redirect()->route('home');
} 
       return 'oops some thing wrong happened';
    */
    
     //return $request->all();
 }




 public function loginProf(Request $request)
 {
    $this->validate($request,[
    
      'email' => 'required|email',
      'password' => 'required',
  ]);
 
  
  $prof= DB::table('professors')
  ->where('email',$request->email)
  ->first();
 $password= Hash::check($request->password, $prof->password);


if($prof && $password)
{

  
 $request->session()->put('user', $prof);
 $request->session()->put('type', 'prof');
 $prof=$request->session()->get('user');

 return redirect()->route('prof.home');
 
}
else if($prof==null){
  return redirect()->route('login')->with('error','email not valid');;
}
else if($password==null){
  return redirect()->route('login')->with('error','password not valid');
}

 }

 public function loginAdmin(Request $request)
 {
    $this->validate($request,[
    
      'email' => 'required|email',
      'password' => 'required',
  ]);
 
  
  $admin= DB::table('professors')
  ->where(
    [
      ['email','=',$request->email],
      ['role','=','admin'],
  ])
  ->first();

 $password= Hash::check($request->password, $admin->password);


if($admin && $password)
{

  
 $request->session()->put('user', $admin);
 $request->session()->put('type', 'admin');
 $admin=$request->session()->get('user');


return redirect()->route('admin.home');
 
}
else if($admin==null){
  return redirect()->route('login')->with('error','email not valid or you are not admin');;
}
else if($password==null){
  return redirect()->route('login')->with('error','password not valid');
}

 }











 public function logout() {
  // Session::forget('user');
  Session::flush();
  return redirect()->route('home');
}


}
