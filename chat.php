<?php
session_start();
require 'onboardingConversation.php';
require 'bot\vendor\botman\driver-web\src\WebDriver';
require_once 'vendor/autoload.php';
require doctrine/cache;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;

use Mpociot\BotMan\Cache\DoctrineCache;
use Doctrine\Common\Cache\FilesystemCache;

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

$doctrineCacheDriver = new FilesystemCache(__DIR__);


   // DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);
   //
   // $botman = BotManFactory::create($config);
DriverManager::loadDriver(\bot\Drivers\Web\WebDriver::class);

// Create BotMan instance
$botman = BotManFactory::create($config, new DoctrineCache($doctrineCacheDriver));



$botman->listen();

$botman->hears('hi', function($bot) {
   $bot->startConversation(new OnboardingConversation);
});


$botman->fallback(function($bot) {
    $bot->reply('Sorry, I did not understand these commands. Here is a list of commands I understand: ...');
});

// Start listening


?>
