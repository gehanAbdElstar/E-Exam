<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class ProfController extends Controller
{
    public function home()
    {
        # code...
        if(Session::has('type') && Session::get('type')=='prof')
       {
           
         return view('profs.home');
       }
       else{
           return redirect()->route('home')->with('status','please log in first');
       }
        }
}
