<?php
namespace App\Conversations;



$_SESSION['room_id'] =0;
$_SESSION['room_type_id']=0;
$_SESSION['Building_id']=0;
$_SESSION['booking_id']=0;


use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Conversations\Conversation;

class OnboardingConversation extends Conversation
{
    protected $firstname;

    protected $email;

    public function run()
    {
        // This will be called immediately
        $this->askRoomType();
        #$this->askFirstname()
    }

    public function askRoomType(){
      $question = Question::create('What kind of room do you need?')
        ->fallback('Unable to book a room')
        ->callbackId('room_type')
        ->addButtons([
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
?>
