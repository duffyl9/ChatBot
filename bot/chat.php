<?php
  require_once 'vendor/autoload.php';

  use BotMan\BotMan\BotMan;
  use BotMan\BotMan\BotManFactory;
  use BotMan\BotMan\Drivers\DriverManager;
  $_SESSION['room_type'];
  $_SESSION['no_people'];
  
  $config = [
   // Your driver-specific configuration
   // "telegram" => [
   //    "token" => "TOKEN"
   // ]
];

  DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);

  $botman = BotManFactory::create($config);

 // Give the bot something to listen for.
$botman->hears('yes', function (BotMan $bot) {
   $bot->reply('Great! What kind of room would you like? 1 = function room, 0 = a meeting room');
});

$botman->hears('meeting', function (BotMan $bot, $room){
  $bot->reply('Great! What kind of room would you like? A function room or a meeting room?');

});
$botman->fallback(function($bot) {
   $bot->reply('Sorry, I did not understand these commands. Here is a list of commands I understand: ...');
});

// Start listening
$botman->listen();

?>
