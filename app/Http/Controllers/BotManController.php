<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;

class BotManController extends Controller
{
    public function handle()
    {
        $botman = app('botman');
        $botman->hears('{message}', function ($botman, $message) {
            if ($message == 'hi') {
                $botman->hears('{message}', function ($botman, $message) {
                    if ($message == 'order') {
                        $botman->reply("sige order k lang");
                    } else {
                        $botman->reply("Start a conversation by saying hi");
                    }
                });
            } else {
                $botman->reply("Start a conversation by saying hi");
            }
        });

        $botman->listen();
    }

    public function askName($botman)
    {
        $botman->reply('Hi there! I\'m YearnBot, your virtual assistant. How can I help you today?');
        $botman->hears('{message}', function ($botman, $message) {
            if ($message == 'order') {
                $botman->reply("sige order k lang");
            } else {
                $botman->reply("Start a conversation by saying hi");
            }
        });

    }
}
