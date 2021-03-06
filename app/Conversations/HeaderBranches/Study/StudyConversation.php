<?php

namespace  App\Conversations\HeaderBranches\Study;


use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;use App\Conversations\Utilities\Shared;


class StudyConversation extends Conversation
{
  
   public function __construct($headerText)
   { $this->HeaderText=$headerText;
    
      
       $this->choices=array('deg'=>'درجات الطلاب',
       'courses'=>'مواد الكلية',
        'depts'=>'أقسام الكلية'
       );

   }

  
    public function askStudy()
    {
      


        $question = Question::create("اختر موضوعًا فرعيًا من" . "\n" . $this->HeaderText)
            ->fallback('Unable to ask question')
            ->callbackId('ask_study')
            ->addButtons([
                Button::create($this->choices['deg'])->value('deg'),
                Button::create($this->choices['courses'])->value('courses'),
                Button::create($this->choices['depts'])->value('depts'),
               
            ]);
           
       
         $this->ask($question, function (Answer $answer) {
           


            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === 'deg') {
                  
                    $this->bot->startConversation(new DegreesConversation($this->choices['deg']));
                  
                } 
                else if ($answer->getValue() === 'courses') {
                    $this->bot->startConversation(new CoursesConversation($this->choices['courses']));
                }
                else if ($answer->getValue() === 'depts') {
                    
                    
                    $depts = Shared::getInfoObject(
                        $this->choices['depts']
                    );



                    $this->say($depts->contents);
                    if ($depts->media1_path != null)
                        $this->say(Shared::getAttachement($depts->media1_path, 1));
                    if ($depts->media2_path != null)
                        $this->say(Shared::getAttachement($depts->media2_path, 2));
                
                
                }
               
            }
        });
    }
  

   

   
    /**
     * Start the conversation
     */
    public function run()
    {
        $this->askStudy();
    }
}


    
