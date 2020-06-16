<?php

namespace App\Conversations\CollegeConversations\HeaderBranches\UniversityCity;

use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use App\Conversations\CollegeConversation;


class LivingSystemConversation extends CollegeConversation
{
   
  
    public function __childconstruct()
    {
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
                if ($answer->getValue() === 'how') {
                    $food =$this->getInfoObject(
                        $this->choices['food']);
 
                     $this->say($food->contents);
                     if($food->media1_path!=null)
                     $this->say($this->getAttachement($food->media1_path,1));
                     if($food->media2_path!=null)
                     $this->say($this->getAttachement($food->media2_path,2));
                  
                } else if ($answer->getValue() === 'rules') {
                    $stay =$this->getInfoObject(
                        $this->choices['stay']);
 
                     $this->say($stay->contents);
                     if($stay->media1_path!=null)
                     $this->say($this->getAttachement($stay->media1_path,1));
                     if($stay->media2_path!=null)
                     $this->say($this->getAttachement($stay->media2_path,2));
                     
                  
                }
            }
        });
    }


    public function run()
    {
        $this->askLiving();
    }
}