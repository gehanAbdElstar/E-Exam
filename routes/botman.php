<?php
use App\Http\Controllers\BotManController;
use BotMan\Drivers\Telegram\TelegramDriver;
use BotMan\Drivers\Facebook\Extensions;
use BotMan\Drivers\Facebook\Extensions\ListTemplate;
use BotMan\Drivers\Facebook\Extensions\Element;
use BotMan\Drivers\Facebook\Extensions\ElementButton;
use BotMan\Drivers\Facebook\Extensions\ButtonTemplate;
use BotMan\Drivers\Facebook\Extensions\GenericTemplate;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;use App\Conversations\Utilities\Shared;
use App\Conversations\HeaderConversation;
$botman = resolve('botman');


    
$botman->hears('hello', function ($bot) {
    $bot->reply('hello '.PHP_EOL.' world',['parse_mode'=>'HTML']);
});
$botman->hears('hay', function ($bot) {
    $bot->reply("hello\nworld");
});
$botman->hears('H', function($bot) {
   // $bot->startConversation(new OnboardingConversation);
});





use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;

$botman->hears('img', function ($bot) {
    // Create attachment
   $attachment = Image::url(url('collegeInformationImages/coursesPoints.PNG'));
    //$attachment = Image::url('https://cdn-media-1.freecodecamp.org/images/5WdWqo8y412lw8lMtH2cacPB9ptbi4I8uDdX');

    // Build message object
    $message = OutgoingMessage::create('This is my text')
                ->withAttachment($attachment);

    // Reply message object
    $bot->reply($message);
});
use BotMan\BotMan\Messages\Attachments\File;

$botman->hears('file', function ($bot) {
    $attachment = File::url('http://www.kfs.edu.eg/computers/pdf/131220171325615.pdf');
    
    // Build message object
    $message = OutgoingMessage::create('This is my text')
                ->withAttachment($attachment);
    
    // Reply message object
    $bot->reply($message);
   
});
// Create attachment


$botman->hears('Start conversation', BotManController::class.'@startConversation');
$botman->fallback(function($bot) {
    $bot->startConversation(new HeaderConversation(''));
});


$botman->hears('خريطة',function($bot)
{
   $image=Image::url('/pics/map.png');
   $message = OutgoingMessage::create('')
                ->withAttachment($image);
   $bot->reply($message);
});