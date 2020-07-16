<?php

namespace App\Conversations\HeaderBranches\UniversityCity;

use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;use App\Conversations\Utilities\Shared;


class LivingSystemConversation extends Conversation
{
   
  
    public function __construct($headerText)
    {
        $this->HeaderText=$headerText;
    
        $this->choices = array(
           
                'food' => 'التغذية',
                'stay' => 'الإقامة',
        );
    }

  

    public function askLiving()
    {
        $question = Question::create("اختر موضوعًا فرعيًا من"."\n".$this->HeaderText)
            ->fallback('Unable to ask question')
            ->callbackId('ask_living')
            ->addButtons([
                Button::create($this->choices['food'])->value('food'),
                Button::create($this->choices['stay'])->value('stay'),


            ]);

        $this->ask($question, function (Answer $answer) {
             if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === 'food') {
                    $food =Shared::getInfoObject(
                        $this->choices['food']);
 
                     $this->say($food->contents);
                     if($food->media1_path!=null)
                     $this->say(Shared::getAttachement($food->media1_path,1));
                     if($food->media2_path!=null)
                     $this->say(Shared::getAttachement($food->media2_path,2));
                     // Access user
         
                } else if ($answer->getValue() === 'stay') {
                    $stay =Shared::getInfoObject(
                        $this->choices['stay']);
 
                     $this->say($stay->contents);
                     if($stay->media1_path!=null)
                     $this->say(Shared::getAttachement($stay->media1_path,1));
                     if($stay->media2_path!=null)
                     $this->say(Shared::getAttachement($stay->media2_path,2));
                     
                  
                }
            }
        });
    }


    public function run()
    {
        $this->askLiving();
    }
}