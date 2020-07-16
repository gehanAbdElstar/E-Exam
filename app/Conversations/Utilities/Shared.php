<?php

namespace App\Conversations\Utilities;
use BotMan\BotMan\Messages\Attachments\Audio;
use BotMan\BotMan\Messages\Attachments\Contact;
use BotMan\BotMan\Messages\Attachments\File;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Attachments\Location;
use BotMan\BotMan\Messages\Attachments\Video;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use App\MainTopic;
use App\CollegeInformation;
class Shared{

private static $mainTopics;
private static $collegeInformation;


private static $initialized = false;

 /*public function __construct(string $headerText) {
    $this->HeaderText=$headerText;
    $this->mainTopics = MainTopic::all();
    $this->collegeInformation =CollegeInformation::all();
   //$this->__childconstruct();
  //  self::$initialized=true;

 }*/
//abstract public function __childconstruct();

private static function initialize()
 {
     if (self::$initialized)
         return;

     self::$mainTopics = MainTopic::all();
     self::$collegeInformation =CollegeInformation::all();
     self::$initialized=true;
 }

public static function getInfoObject( $topic,$name=null)
{
    self::initialize();
  $information= //condition
                $name == null?
                //result if yes
                self::$collegeInformation->where('topic', $topic)
                ->first()               
                :
                self::$mainTopics
                ->where('name', $name)->first()
                ->collegeInformation->where('topic', $topic)
                ->first();
                //result if no
   return $information;             
               
}

public static function getAttachement(string $url, int $num)
{
    // $filename = end(explode('/', $url));
    if (strpos(mime_content_type($url), 'image') !== false) {

        $attachment = Image::url(url($url));
        $message = OutgoingMessage::create('صورة ' . $num)
            ->withAttachment($attachment);
        return $message;
    } else if (strpos(mime_content_type($url), 'audio')) {
        $attachment = Audio::url(url($url));
        $message = OutgoingMessage::create('تسجيل' . $num)
            ->withAttachment($attachment);
        return $message;
    } else if (strpos(mime_content_type($url), 'vedio')) {
        $attachment = Video::url(url($url));
        $message = OutgoingMessage::create('فيديو ' . $num)
            ->withAttachment($attachment);
        return $message;
    } else {
        $attachment = File::url(url($url));
        $message = OutgoingMessage::create('ملف ' . $num)
            ->withAttachment($attachment);
        return $message;
    }
}
}
