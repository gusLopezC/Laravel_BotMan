<?php

namespace App\Conversations;

use App\Values\Operator;
use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class Operations extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function run()
    {
        //
        $this->askOperations();
    }

    private function askOperations(){
        
        $question = Question::create("Que concepto desea recordar?")
        ->fallback('No se pudo responder la pregunta')
        ->callbackId('ask_reason')
        ->addButtons([
            Button::create('Suma')->value('S'),
            Button::create('Resta')->value('R'),
            Button::create('Multiplicacion')->value('M'),
            Button::create('Divison')->value('D'),

        ]);

    return $this->ask($question, function (Answer $answer) {       
            if($answer->isInteractiveMessageReply()){
                $content=Operator::getStrategy($answer->getValue());
                $this->say((new $content)->process());
            }
        });

    }
}
