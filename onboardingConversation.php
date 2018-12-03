<?php

namespace App\Conversations;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class ExampleConversation extends Conversation
{

    public function run()
    {
        // This will be called immediately
        $this->askRoomType();
    }
    protected $firstname;

    protected $email;

    public function askRoomType()
    {
        $question = Question::create('What kind of room do you need?');
        $botman->fallback('Unable to book a room');
        $botman->callbackId('room_type');
        $botman->addButtons([
            Button::create('Function')->value('1'),
            Button::create('Meeting')->value('0'),
        ]);

        $this->ask($question, function (Answer $answer) {
        // Detect if button was clicked:
            if ($answer->isInteractiveMessageReply()) {
                $_SESSION['room_type_id'] =int ($answer->getValue()); // will be either '0' or '1'
                $selectedText = $answer->getText(); // will be either 'Of course' or 'Hell no!'


            }
        });
    }
    public function askFirstname()
    {
        $this->ask('Hello! What is your firstname?', function(Answer $answer) {
            // Save result
            $this->firstname = $answer->getText();

            $this->say('Nice to meet you '.$this->firstname);
            $this->askEmail();
        });
    }

    public function askEmail()
    {

    	$this->ask('One more thing - what is your email?', function(Answer $answer) {
    		// Save result
    		$this->email = $answer->getText();

    		$this->say('Great - that is all we need, '.$this->firstname);

    		//$this->bot->startConversation(new FavouriteLunchConversation());firstname);
        });
    }


}

