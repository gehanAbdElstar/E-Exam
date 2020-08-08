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

$studentsubmited=DB::table('exams_students')
     ->where('stud_id',Session::get('user')->id)
     ->select('exam_id')
     ->get();
    

$studentsPassedExams=DB::table('exams')
->join('exams_students', 'exams.id', '=', 'exams_students.exam_id')
->where('stud_id',Session::get('user')->id)
->select('id')
->get()->toArray();
$passedExams=array();
foreach ($studentsPassedExams as $key => $value) {
    # code...
    $passedExams[$key]=$value->id;
}


$subjectsExams=DB::table('exams')
->whereIn('subj_id',$subjects)
->whereNotIn('id',$passedExams)
->get();
//dd($subjectsExams);
/*$userExams= DB::table('exams')
            ->join('exams_questions', 'exams.id', '=', 'exams_questions.exam_id')
            ->join('questions', 'exams_questions.que_id', '=', 'questions.id')
            ->join('choices', 'questions.id', '=', 'choices.que_id')
            ->whereIn('exams.subj_id',$subjects)
            ->get();
         */
    return view('students.home',['subjects'=>$userSubjects,'exams'=>$subjectsExams,'submited'=>$studentsubmited]);
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

           


     $exam=DB::table('exams')
     ->where('id',$id)
     ->first();

     



            $choices=DB::table('choices')
            ->inRandomOrder()
         //  ->join('choices', 'questions.id', '=', 'choices.que_id')
          // ->select('*')
            ->get();
           // dd($exam);
            //dd($questions);
            return view('students.exam',['questions'=>$questions,'choices'=>$choices,'exam'=>$exam]);

    }



    public function examCheck($id,Request $request)
    {
    # code...
     
     $questions= DB::table('exams_questions')
     ->join('questions', 'exams_questions.que_id', '=', 'questions.id')
    // ->join('choices', 'questions.id', '=', 'choices.que_id')
     ->where('exams_questions.exam_id',$id)
    // ->select('', 'contacts.phone', 'orders.price')
    
     ->get();

$exam=DB::table('exams')
->where('id',$id)
->first();


     $choices=DB::table('choices')
     ->inRandomOrder()
  //  ->join('choices', 'questions.id', '=', 'choices.que_id')
   // ->select('*')
     ->get();


     $studentDegree=0;
        foreach ($questions as $quest) {
            # code...
            $i=$quest->id;
           $index='choice'.$i;
            if($request[$index]==$quest->correct_answer)
       $studentDegree +=$quest->degree;
        }
      
     DB::table('exams_students')
     ->insert(['exam_id'=> $id,'stud_id' => Session::get('user')->id
     ,'degree'=>"$studentDegree out of $exam->degree"]);
        # code...*/
     $status='';
        if($studentDegree >= $exam->degree/2)
        {
           $status="congratulation you are succedded in exam" ;
           
        }
        else{
            $status="sorry  you failed in exam" ;
        }

        return redirect()->route('students.results')
        ->with('status',$status)
        ->with('degree',"$studentDegree out of $exam->degree");
       // dd($studentDegree);

    }


    public function results()
    {
      $userSubjects= DB::select('select * from subjects 
      inner join depts_subjects 
      on depts_subjects.subj_id= subjects.id
      where  depts_subjects.dep_id= ?
      and subjects.level_id= ?', [Session('user')->dep_id,Session('user')->level_id]);
    # code...
     $studentsPassedExams=DB::table('exams')
     ->join('exams_students', 'exams.id', '=', 'exams_students.exam_id')
     ->where('stud_id',Session::get('user')->id)
     ->get()->toArray();



    return view('students.results',['exams'=>$studentsPassedExams,'subjects'=>$userSubjects]);

    }























}
