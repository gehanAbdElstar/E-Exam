<?php

namespace App\Conversations\CollegeConversations;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use  App\Conversations\CollegeConversations\HeaderBranches\Study\StudyConversation;
use  App\Conversations\CollegeConversations\HeaderBranches\CollegeOverviewConversation;
use  App\Conversations\CollegeConversations\HeaderBranches\PunishmentsAndPaymentsConversation;
use App\Conversations\CollegeConversations\HeaderBranches\UniversityCity\UniversityCityConversation;
class HeaderConversation extends Conversation
{
   
      public function __childconstruct()
      {
          $this->choices=array(
              'الدراسة',
              'نظرة عامة عن الكلية',
              'القواعد العقوبات والمدفوعات',
              'المدينة الجامعية'
          );
      }

    public function askSubject()
    {
        $question = Question::create("اختر موضوعًا")
            ->fallback('Unable to ask question')
            ->callbackId('ask_subject')
            ->addButtons([
                Button::create($this->choices[0])->value('study'),
                Button::create($this->choices[1])->value('college'),
                Button::create($this->choices[2])->value('punishments'),
                Button::create($this->choices[3])->value('city'),
            ]);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === 'study') {
                  
                   
                    $this->bot->startConversation(new StudyConversation($this->choices[0]));
                } 
                else if ($answer->getValue() === 'college') {
                    $this->bot->startConversation(new CollegeOverviewConversation($this->choices[1]));
                }
                else if ($answer->getValue() === 'punishments') {
                    $this->bot->startConversation(new PunishmentsAndPaymentsConversation($this->choices[2]));
                }
                else if ($answer->getValue() === 'city') {
                    $this->bot->startConversation(new UniversityCityConversation($this->choices[3]));
                }
            }
        });
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->askSubject();
    }
}

