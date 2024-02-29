<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Message\Incoming\Answer;

class BotManController extends Controller
{
    public function handle()
    {
        $botman = app('botman');
        $botman->hears('{message}', function($botman, $message) {
            
            if ($message == 'hi') {
                $this->askName($botman);
            }

            else{
                $botman->reply("Start a conversation by saying hi");
            }
        });

        $botman->listen();
    }
}
