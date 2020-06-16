<?php

namespace  App\Conversations\CollegeConversations\HeaderBranches;


use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use App\Conversations\CollegeConversation;

class CollegeOverviewConversation extends CollegeConversation
{
   

     public function __childconstruct()
    {
        $this->choices = array(
            'askCollege' => array(
                'overview' => 'نظرة عامة',
                'socialMedia' => 'وسائل التواصل الإجتماعي للكلية',
                'collegeParts' => 'الأقسام التي يتعامل معها الطلاب'
            ),
            'askParts' => array(
                'affairsPart' => 'شئون الطلاب',
                'carePart' => 'رعاية الشباب',
                'healthPart' => 'الرعاية الصحية للطلاب'
            )
        );
    }
    public function askCollege()
    {
        $question = Question::create("اختر موضوعًا فرعيًا من"."\n".$this->HeaderText)
            ->fallback('Unable to ask question')
            ->callbackId('ask_college')
            ->addButtons([
                Button::create($this->choices['askCollege']['overview'])->value('overview'),
                Button::create($this->choices['askCollege']['socialMedia'])->value('socialMedia'),
                Button::create($this->choices['askCollege']['collegeParts'])->value('collegeParts'),


            ]);
            

    foreach ($this->choices as $key => $value) {
        # code...

    }




        $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === 'overview') {
                    $overview = $this->getInfoObject(
                        $this->choices['overview'],
                        $this->HeaderText
                    );
                    if($overview->media1_path!=null)
                    $this->say($this->getAttachement($overview->media1_path,1));
                    if($overview->media2_path!=null)
                    $this->say($this->getAttachement($overview->media2_path,2));
                    $this->say($overview->contents);
                 }
                else if ($answer->getValue() === 'socialMedia') {
                  
                    $socialMedia =$this->getInfoObject($this->choices['socialMedia']);

                    
                $this->say($socialMedia->contents);
                if($socialMedia->media1_path!=null)
                    $this->say($this->getAttachement($socialMedia->media1_path,1));
                    if($socialMedia->media2_path!=null)
                    $this->say($this->getAttachement($socialMedia->media2_path,2));
                } 
                else if ($answer->getValue() === 'collegeParts') {
                  //name means user ask about parts
                  //the bot is the asked one  
                $this->askParts($this->choices['askCollege']['collegeParts']);
                  

                }
            }
        });
    }

    public function askParts($headerText)
    {
        $question = Question::create("اختر موضوعًا فرعيًا من"."\n".$headerText)
            ->fallback('Unable to ask question')
            ->callbackId('ask_parts')
            ->addButtons([
                Button::create($this->choices['askParts']['affairsPart'])->value('affairsPart'),
                Button::create($this->choices['askParts']['carePart'])->value('carePart'),
                Button::create($this->choices['askParts']['healthPart'])->value('healthPart'),


            ]);

        $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === 'affairsPart') {
                    $affairsPart =$this->getInfoObject($this->choices['affairsPart']);

                    $this->say($affairsPart->contents);
                    if($affairsPart->media1_path!=null)
                    $this->say($this->getAttachement($affairsPart->media1_path,1));
                    if($affairsPart->media2_path!=null)
                    $this->say($this->getAttachement($affairsPart->media2_path,2));
                 }
                else if ($answer->getValue() === 'carePart') {
                  
                    $carePart =$this->getInfoObject($this->choices['carePart']);

                    $this->say($carePart->contents);
                    if($carePart->media1_path!=null)
                    $this->say($this->getAttachement($carePart->media1_path,1));
                    if($carePart->media2_path!=null)
                    $this->say($this->getAttachement($carePart->media2_path,2));
                    
               
                } 
                else if ($answer->getValue() === 'healthPart') {
                  //name means user ask about parts
                  //the bot is the asked one  
                  $healthPart =$this->getInfoObject($this->choices['healthPart']);

                  $this->say($healthPart->contents);
                  if($healthPart->media1_path!=null)
                  $this->say($this->getAttachement($healthPart->media1_path,1));
                  if($healthPart->media2_path!=null)
                  $this->say($this->getAttachement($healthPart->media2_path,2));
                  

                }
            }
        });
    }
















    public function run()
    {
        $this->askCollege();
    }
}
