<?php
session_start();
require 'onboardingConversation.php';
require 'bot\vendor\botman\driver-web\src\WebDriver';
require_once 'vendor/autoload.php';

   use BotMan\BotMan\BotMan;
   use BotMan\BotMan\BotManFactory;
   use BotMan\BotMan\Drivers\DriverManager;

use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

   $config = [
    // Your driver-specific configuration
    // "telegram" => [
    //    "token" => "TOKEN"
    // ]
];


   // DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);
   //
   // $botman = BotManFactory::create($config);
DriverManager::loadDriver(\bot\Drivers\Web\WebDriver::class);

// Create BotMan instance
BotManFactory::create($config);

$botman->listen();

$botman->hears('Hello ', function($bot) {
   $bot->startConversation(new onboardingConversation);
  });


$botman->fallback(function($bot) {
    $bot->reply('Sorry, I did not understand these commands. Here is a list of commands I understand: ...');
});

// Start listening


?>
