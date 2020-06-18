<?php

namespace App\Conversations\CollegeConversations\HeaderBranches\UniversityCity;

use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class AcceptanceConversation extends Conversation
{
   
    

    public function __childconstruct()
    {
        $this->choices = array(
            //means ask about city
            
                'how' => 'شروط قبول الطلاب',
                'rules' => 'قواعد القبول',
        );
    }
 

    public function askAccept()
    {
        $question = Question::create("اختر موضوعًا فرعيًا من"."\n".$this->HeaderText)
            ->fallback('Unable to ask question')
            ->callbackId('ask_accept')
            ->addButtons([
                Button::create($this->choices['how'])->value('how'),
                Button::create($this->choices['rules'])->value('rules')


            ]);

        $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === 'how') {
                    $how =$this->getInfoObject(
                        $this->choices['how']);
 
                     $this->say($how->contents);
                     if($how->media1_path!=null)
                     $this->say($this->getAttachement($how->media1_path,1));
                     if($how->media2_path!=null)
                     $this->say($this->getAttachement($how->media2_path,2));
                  
                } else if ($answer->getValue() === 'rules') {
                    $rules =$this->getInfoObject(
                        $this->choices['rules']);
 
                     $this->say($rules->contents);
                     if($rules->media1_path!=null)
                    $this->say($this->getAttachement($rules->media1_path,1));
                    if($rules->media2_path!=null)
                    $this->say($this->getAttachement($rules->media2_path,2));
                  
                }
            }
        });
    }


    public function run()
    {
        $this->askAccept();
    }
}