<?php

namespace  App\Conversations\CollegeConversations\HeaderBranches\Study;


use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use App\Conversations\CollegeConversation;
class DegreesConversation extends CollegeConversation
{

   public function __childconstruct()
   {
      
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
                  
                   $studentDeg =$this->getInfoObject($this->choices['deg']);

                   $this->say($studentDeg->contents);
                   if ($studentDeg->media1_path != null)
                       $this->say($this->getAttachement($studentDeg->media1_path, 1));
                   if ($studentDeg->media2_path != null)
                       $this->say($this->getAttachement($studentDeg->media2_path, 2));
                  
                } 
                else if ($answer->getValue() === 'overview') {
                     $overview = $this->getInfoObject(
                        $this->choices['overview']
                    );

                    $this->say($overview->contents);
                    if ($overview->media1_path != null)
                        $this->say($this->getAttachement($overview->media1_path, 1));
                    if ($overview->media2_path != null)
                        $this->say($this->getAttachement($overview->media2_path, 2));
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

