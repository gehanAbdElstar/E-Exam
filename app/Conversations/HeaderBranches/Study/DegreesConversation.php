<?php

namespace  App\Conversations\HeaderBranches\Study;


use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;use App\Conversations\Utilities\Shared;

class DegreesConversation extends Conversation
{

   public function __construct($headerText){
       $this->HeaderText=$headerText;
   
      
       $this->choices=array(
        'deg'=>'نتيجة الطلاب',
        'overview'=>'مفاهيم ونظرة عامة'
       );


   }
   
   public function askDegrees()
   {
       $question = Question::create("اختر موضوعًا فرعيًا من" . "\n" . $this->HeaderText)
            ->fallback('Unable to ask question')
            ->callbackId('ask_degrees')
            ->addButtons([
                Button::create($this->choices['deg'])->value('deg'),
                Button::create($this->choices['overview'])->value('overview'),
                
               
            ]);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === 'deg') {
                  
                   $studentDeg =Shared::getInfoObject($this->choices['deg']);

                   $this->say($studentDeg->contents);
                   if ($studentDeg->media1_path != null)
                       $this->say(Shared::getAttachement($studentDeg->media1_path, 1));
                   if ($studentDeg->media2_path != null)
                       $this->say(Shared::getAttachement($studentDeg->media2_path, 2));
                  
                } 
                else if ($answer->getValue() === 'overview') {
                     $overview = Shared::getInfoObject(
                        $this->choices['overview']
                    );

                    $this->say($overview->contents);
                    if ($overview->media1_path != null)
                        $this->say(Shared::getAttachement($overview->media1_path, 1));
                    if ($overview->media2_path != null)
                        $this->say(Shared::getAttachement($overview->media2_path, 2));
                }
              
            }
        });
    }

  


















   
    /**
     * Start the conversation
     */
    public function run()
    {
        $this->askDegrees();
    }
}

