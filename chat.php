<?php


//namespace App\Http\Conversations;

session_start();

require 'onboardingConversation.php';
require 'bot\vendor\botman\driver-web\src\WebDriver';
require_once 'vendor/autoload.php';
//require doctrine/cache;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\BotMan\Cache\DoctrineCache;

//use Mpociot\BotMan\Cache\DoctrineCache;
//use Doctrine\Common\Cache\FilesystemCache;


  session_start();
  require_once 'vendor/autoload.php';
  include ('scripts/db_connect.php');
  $day='';

  use onboardingConversation as convo;
   use BotMan\BotMan\BotMan;
   use BotMan\BotMan\BotManFactory;
   use BotMan\BotMan\Drivers\DriverManager;

   $config = [


     'web' => [
     	'matchingData' => [
             'driver' => 'web',
         ],
     ]
];

   DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);


//$doctrineCacheDriver = new FilesystemCache(__DIR__);

   $botman = BotManFactory::create($config);


  // Give the bot something to listen for.
$botman->hears('hello', function (BotMan $bot) {
    $bot->reply('Would you like to book a room?');
    //$bot->startConversation(new convo);
});

$botman->hears('yes', function (BotMan $bot) {
    $bot->reply('great, for what day?');
});

$botman->hears('on {day}', function ($bot, $day) {


//$botman->listen();

$botman->hears('hi', function($bot) {
   $bot->startConversation(new OnboardingConversation());
});

//$botman->startConversation(new PizzaConversation(), 'my-recipient-user-id', TelegramDriver::class);


    $bot->reply('What time on ' . $day . '?');
    //$day = $day;

});

$botman->hears('at ([0-9]+)', function ($bot, $number) {
    $bot->reply('Perfect, see you then!' );
});
>>>>>>> 3139729306341d96ca2d285e0971f9b4aa0b0c3d

$botman->fallback(function($bot) {
    $bot->reply('Sorry, I did not understand these commands. Here is a list of commands I understand: ...');
});

printf($day);
// Start listening
$botman->listen();



?>
