<?php

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

Route::get('/', function () {
  return view('welcome');
 // $list = App\MainTopic::find(1)->CollegeInformation()->first();
 /*$choices=array(
  'askCourses'=>
               array('tables'=>'الجداول',
                         'credit'=>'الساعات المعتمدة',
                         'courses'=>'المواد',
                         'pastExams'=>'إمتحانات سابقة'
                         ),
   'askTables'=>
                array(
                    'lecTables'=>'الجداول الدراسية',
                      'examTables'=>'جداول الإمتحانات'
                ),
  'askCredit'=>
               array(
                  'overview'=>'نظرة عامة',
                   'register'=>'التسجيل'
               
               )
                  );
 $mainTopics=App\MainTopic::all();
  echo $mainTopics->
  where('name',$choices['askCourses']['credit'])
  ->first()->collegeInformation->
   where('topic',$choices['askCredit']['register'])
   ->first()->contents;



/*
  echo $list->id.' '.$list->topic.'<br>';
  echo App\CollegeInformation::
  where('topic','=','أقسام الكلية')
  ->first()
  ->contents;
  */
/*$main=new App\MainTopic();
//$main->find(1)->CollegeInformation();
  $data=$main->all(array('id','name'));
  $data2=$data->find(1)->CollegeInformation();
 // $data->find(12)->delete();
  //$main::create(array('name'=>'منى'));
  foreach($data2 as $list){
      echo $list->id.' '.$list->topic.'<br>';
  }*/


});

Route::match(['get', 'post'], '/botman', 'BotManController@handle');

/*Route::get('/botman2','BotManController@handle2');*/
Route::get('/botman/tinker', 'BotManController@tinker');
