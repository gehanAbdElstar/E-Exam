<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
class StudentController extends Controller
{
    //
    public function home()
    {
    # code...
    if(Session::has('type') && Session::get('type')=='student')
   {
       $student=Session::get('user');
      $userSubjects= DB::select('select * from subjects 
       inner join depts_subjects 
       on depts_subjects.subj_id= subjects.id
       where  depts_subjects.dep_id= ?
       and subjects.level_id= ?', [$student->dep_id,$student->level_id]);

    $subjects=array();
foreach ($userSubjects as $key => $value) {
    # code...
    $subjects[$key]=$value->id;
}
    



/*$userExams=DB::select('select * from exams 
inner join exams_questions
on exams_questions.exam_id= exams.id
inner join questions 
on exams_questions.que_id=questions.id
inner join choices
on choices.que_id=questions.id
where  exams.subj_id in
', [$subjects]
);*/
$subjectsExams=DB::table('exams')
->whereIn('subj_id',$subjects)
->get();

$userExams= DB::table('exams')
            ->join('exams_questions', 'exams.id', '=', 'exams_questions.exam_id')
            ->join('questions', 'exams_questions.que_id', '=', 'questions.id')
            ->join('choices', 'questions.id', '=', 'choices.que_id')
            ->whereIn('exams.subj_id',$subjects)
           // ->select('', 'contacts.phone', 'orders.price')
           
            ->get();
           // dd($userSubjects);
            //dd($subjects);
         //   dd($subjectsExams);
          //  dd($userExams);
    return view('students.home',['subjects'=>$userSubjects,'exams'=>$subjectsExams]);
   }
   else{
       return redirect()->route('home')->with('status','please log in first');
   }
    }



    public function exam($id)
    {
    # code...
    $questions= DB::table('exams_questions')
            ->join('questions', 'exams_questions.que_id', '=', 'questions.id')
           // ->join('choices', 'questions.id', '=', 'choices.que_id')
            ->where('exams_questions.exam_id',$id)
           // ->select('', 'contacts.phone', 'orders.price')
           
            ->get();

            $choices=DB::table('choices')
            ->inRandomOrder()
         //  ->join('choices', 'questions.id', '=', 'choices.que_id')
          // ->select('*')
            ->get();
            //dd($questions);
            return view('students.exam',['questions'=>$questions,'choices'=>$choices]);

    }
























}
