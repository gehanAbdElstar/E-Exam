<?php

namespace App\Conversations\CollegeConversations\HeaderBranches\UniversityCity;


use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

//use BotMan\BotMan\Messages\Conversations\Conversation;s\HeaderBranches\UniversityCity\Ac

class UniversityCityConversation extends Conversation
{

   

     public function __childconstruct()
    {
        
       

        
        $this->choices = array(
            //means ask about city

            'overview' => 'نظرة عامة',
            'acceptance' => 'كيفية القبول في المدينة',
            'living' => 'نظام المعيشة',
            'punishments' => 'النظام التأديبى للطلاب في المدينة',
            'register' => 'التسجيل',
            'management' => 'إدارات المدينة',



        );
    }

    public function askCity()
    {
        $question = Question::create("اختر موضوعًا فرعيًا من" . "\n" . $this->HeaderText)
            ->fallback('Unable to ask question')
            ->callbackId('ask_college')
            ->addButtons([
                Button::create($this->choices['overview'])->value('overview'),
                Button::create($this->choices['acceptance'])->value('acceptance'),
                Button::create($this->choices['living'])->value('living'),
                Button::create($this->choices['punishments'])->value('punishments'),
                Button::create($this->choices['register'])->value('register'),
                Button::create($this->choices['management'])->value('management')


            ]);

        $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === 'overview') {

                    $overview = $this->getInfoObject(
                        $this->choices['overview'],
                        $this->HeaderText
                    );

                    $this->say($overview->contents);
                    if ($overview->media1_path != null)
                        $this->say($this->getAttachement($overview->media1_path, 1));
                    if ($overview->media2_path != null)
                        $this->say($this->getAttachement($overview->media2_path, 2));
                } else if ($answer->getValue() === 'acceptance') {

                    $this->bot->startConversation(new AcceptanceConversation($this->choices['acceptance']));;
                } else if ($answer->getValue() === 'living') {
                    //name means user ask about parts
                    //the bot is the asked one  
                    $this->bot->startConversation(new LivingSystemConversation($this->choices['living']));
                } else if ($answer->getValue() === 'punishments') {

                    $punishments = $this->getInfoObject($this->choices['punishments']);

                    $this->say($punishments->contents);
                    if ($punishments->media1_path != null)
                        $this->say($this->getAttachement($punishments->media1_path, 1));
                    if ($punishments->media2_path != null)
                        $this->say($this->getAttachement($punishments->media2_path, 2));
                } else if ($answer->getValue() === 'register') {

                    $register = $this->getInfoObject(
                        $this->choices['register'],
                        $this->HeaderText
                    );



                    $this->say($register->contents);
                    if ($register->media1_path != null)
                        $this->say($this->getAttachement($register->media1_path, 1));
                    if ($register->media2_path != null)
                        $this->say($this->getAttachement($register->media2_path, 2));
                } else if ($answer->getValue() === 'management') {

                    $management = $this->getInfoObject($this->choices['management']);

                    $this->say($management->contents);
                    if ($management->media1_path != null)
                        $this->say($this->getAttachement($management->media1_path, 1));
                    if ($management->media2_path != null)
                        $this->say($this->getAttachement($management->media2_path, 2));
                }
            }
        });
    }




































    public function run()
    {
        $this->askCity();
    }
}
