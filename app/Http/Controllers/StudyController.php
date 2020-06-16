<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CollegeInformation;
use App\MainTopic;

class StudyController extends Controller
{
    //
  var $mainTopics;
   var $collegeInformation;
   public function __construct()
   {
       $this->mainTopics =MainTopic::all();
       $this->collegeInformation=CollegeInformation::all();

   }
}
