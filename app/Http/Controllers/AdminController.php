<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
class AdminController extends Controller
{
    //
    public function home()
    {
        # code...
        if(Session::has('type') && Session::get('type')=='admin')
       {
           
         return view('admins.home');
       }
       else{
           return redirect()->route('home')->with('status','please log in first');
       }
        }
}
