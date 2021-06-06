<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use App\Conversations\ExampleConversation;
use App\Conversations\Interactives;
use App\Conversations\Operations;


class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');

        $botman->listen();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tinker()
    {
        return view('tinker');
    }

    /**
     * Loaded through routes/botman.php
     * @param  BotMan $bot
     */
    public function startConversation(BotMan $bot)
    {
        $bot->startConversation(new ExampleConversation());
    }


      /**
     * Loaded through routes/botman.php
     * @param  BotMan $bot
     */
    public function startOperaciones(BotMan $bot)
    {
        $bot->startConversation(new Operations());
    }
    
      /**
     * Loaded through routes/botman.php
     * @param  BotMan $bot
     */
    public function startInteractive(BotMan $bot)
    {
        $bot->startConversation(new Interactives());
    }
    
}
