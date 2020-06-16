<?php

namespace  App\Conversations\CollegeConversations\HeaderBranches\Study;

use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use App\Conversations\CollegeConversation;
class CoursesConversation extends CollegeConversation
{
    

     public function __childconstruct()
    {
        $this->choices = array(
            'askCourses' =>
            array(
                'tables' => 'الجداول',
                'credit' => 'الساعات المعتمدة',
                'courses' => 'المواد',
                'pastExams' => 'إمتحانات سابقة'
            ),
            'askTables' =>
            array(
                'lecTables' => 'الجداول الدراسية',
                'examTables' => 'جداول الإمتحانات'
            ),
            'askCredit' =>
            array(
                'overview' => 'نظرة عامة',
                'register' => 'التسجيل'

            )
        );
    }
   

    public function askCourses()
    {
        $question = Question::create("اختر موضوعًا فرعيًا من"."\n".$this->HeaderText)
            ->fallback('Unable to ask question')
            ->callbackId('ask_courses')
            ->addButtons([
                Button::create($this->choices['askCourses']['tables'])->value('tables'),
                Button::create($this->choices['askCourses']['credit'])->value('credit'),
                Button::create($this->choices['askCourses']['courses'])->value('courses'),
                Button::create($this->choices['askCourses']['pastExams'])->value('pastExams')


            ]);

        $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === 'tables') {
                   $headerText=$this->choices['askCourses']['tables'];
                    $this->askTables($headerText);
                } else if ($answer->getValue() === 'credit') {
                    $headerText=$this->choices['askCourses']['credit'];
                    $this->askCredit($headerText);
                } else if ($answer->getValue() === 'courses') {
                    //variables
                    $coursesInfo =  $this->getInfoObject($this->choices['askCourses']['courses']);



                    $this->say($coursesInfo->contents);
                    if($coursesInfo->media1_path!=null)
                    $this->say($this->getAttachement($coursesInfo->media1_path,1));
                    if($coursesInfo->media2_path!=null)
                    $this->say($this->getAttachement($coursesInfo->media2_path,2));
                } else if ($answer->getValue() === 'pastExams') {
                    $pastExams=  $this->getInfoObject($this->choices['askCourses']['pastExams']);



                    $this->say($pastExams->contents);
                    if($pastExams->media1_path!=null)
                    $this->say($this->getAttachement($pastExams->media1_path,1));
                    if($pastExams->media2_path!=null)
                    $this->say($this->getAttachement($pastExams->media2_path,2));
                }
            }
        });
    }

    //______________________________________________________________
    public function askTables($headerText)
    {
        $question = Question::create("اختر موضوعًا فرعيًا من"."\n".$headerText)
            ->fallback('Unable to ask question')
            ->callbackId('ask_tables')
            ->addButtons([
                Button::create($this->choices['askTables']['lecTables'])->value('lecTables'),
                Button::create($this->choices['askTables']['examTables'])->value('examTables'),
            ]);

        $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === 'lecTables') {

                    $lecTables = $this->getInfoObject($this->choices['askTables']['lecTables']);

                    $this->say($lecTables->contents);
                    if($lecTables->media1_path!=null)
                    $this->say($this->getAttachement($lecTables->media1_path,1));
                    if($lecTables->media2_path!=null)
                    $this->say($this->getAttachement($lecTables->media2_path,2));
                } else if ($answer->getValue() === 'examTables') {
                    $examTables = $this->getInfoObject($this->choices['askTables']['examTables']);

                    $this->say($examTables->contents);
                    if($examTables->media1_path!=null)
                    $this->say($this->getAttachement($examTables->media1_path,1));
                    if($examTables->media2_path!=null)
                    $this->say($this->getAttachement($examTables->media2_path,2));
                }
            }
        });
    }
    //_________________________________________________________
    public function askCredit($headerText)
    {
        $question = Question::create("اختر موضوعًا فرعيًا من"."\n".$headerText)
            ->fallback('Unable to ask question')
            ->callbackId('ask_credit')
            ->addButtons([
                Button::create($this->choices['askCredit']['overview'])->value('overview'),
                Button::create($this->choices['askCredit']['register'])->value('register')
            ]);

        $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === 'overview') {

                    $overview = $this->getInfoObject(
                        $this->choices['askCredit']['overview'],
                        $this->HeaderText
                    );

                    $this->say($overview->contents);
                    if($overview->media1_path!=null)
                    $this->say($this->getAttachement($overview->media1_path,1));
                    if($overview->media2_path!=null)
                    $this->say($this->getAttachement($overview->media2_path,2));
                } else if ($answer->getValue() === 'register') {

                    $register =$this->getInfoObject(
                        $this->choices['askCredit']['register'],
                        $this->choices['askCourses']['credit']
                    );



                    $this->say($register->contents);
                    if($register->media1_path!=null)
                    $this->say($this->getAttachement($register->media1_path,1));
                    if($register->media2_path!=null)
                    $this->say($this->getAttachement($register->media2_path,2));

                    /*  if($coursesInfo->media1_path=== null)
                 {
                    $ext = end(explode('.', $coursesInfo->media1_path));
                     if($ext=='pdf')
                     {
                         
                         }
                 }*/
                }
            }
        });
        
    }

























    

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->askCourses();
    }
}
