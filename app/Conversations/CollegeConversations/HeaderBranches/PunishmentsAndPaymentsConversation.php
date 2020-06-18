<?php


namespace  App\Conversations\CollegeConversations\HeaderBranches;

use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class PunishmentsAndPaymentsConversation extends Conversation
{
   

     public function __childconstruct()
    {
        $this->choices = array(
           
                'badAct' => 'أفعال يُعاقب عليها',
                'punshiments' => 'العقوبات التأديبية',
                'alert' => 'الإنذار الأكاديمي ووضع الطالب تحت الملاحظة',
                'payments'=>'مصاريف الكلية'
          
        );
    }

    public function askCollege()
    {
        $question = Question::create("اختر موضوعًا فرعيًا من"."\n".$this->HeaderText)
            ->fallback('Unable to ask question')
            ->callbackId('ask_college')
            ->addButtons([
                Button::create($this->choices['badAct'])->value('badAct'),
                Button::create($this->choices['punshiments'])->value('punshiments'),
                Button::create($this->choices['alert'])->value('alert'),
                Button::create($this->choices['payments'])->value('payments')


            ]);

        $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === 'badAct') {
                    $badAct =$this->getInfoObject(
                        $this->choices['badAct']
                    );

                    $this->say($badAct->contents);
                    if($badAct->media1_path!=null)
                    $this->say($this->getAttachement($badAct->media1_path,1));
                    if($badAct->media2_path!=null)
                    $this->say($this->getAttachement($badAct->media2_path,2));
                 }
                else if ($answer->getValue() === 'punshiments') {
                  
                    $punishments =$this->getInfoObject($this->choices['punshiments']);

                    $this->say($punishments->contents);
                    if($punishments->media1_path!=null)
                    $this->say($this->getAttachement($punishments->media1_path,1));
                    if($punishments->media2_path!=null)
                    $this->say($this->getAttachement($punishments->media2_path,2));
                } 
                else if ($answer->getValue() === 'alert') {
                  //name means user ask about parts
                  //the bot is the asked one  
                  $alert =$this->getInfoObject($this->choices['alert']);



                  $this->say($alert->contents);
                  if($alert->media1_path!=null)
                  $this->say($this->getAttachement($alert->media1_path,1));
                  if($alert->media2_path!=null)
                  $this->say($this->getAttachement($alert->media2_path,2));
                  

                }
                else if ($answer->getValue() === 'payments') {
                  
                    $payments =$this->getInfoObject($this->choices['payments']);



                    $this->say($payments->contents);
                    if($payments->media1_path!=null)
                    $this->say($this->getAttachement($payments->media1_path,1));
                    if($payments->media2_path!=null)
                    $this->say($this->getAttachement($payments->media2_path,2));
                } 
            }
        });
    }











    public function run()
    {
        $this->askCollege();
    }
    
}