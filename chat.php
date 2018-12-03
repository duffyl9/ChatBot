<?php
  session_start();
  require_once 'vendor/autoload.php';
  include ('scripts/db_connect.php');
  $day='';

//   use onboardingConversation as convo;
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

    $bot->reply('What time on ' . $day . '?');
    //$d = $day;

});

$botman->hears('at ([0-9]+)', function ($bot, $number) {
    $bot->reply('Perfect. We will send you an email for confirmation. This will contain the details of your booking, See you then!' );
});

$botman->fallback(function($bot) {
    $bot->reply('Sorry, I did not understand these commands. Here is a list of commands I understand: ...');
});

//printf($day);
// Start listening
$botman->listen();
