<?php
/**
 * Created by PhpStorm.
 * User: Igor
 * Date: 20.03.2019
 * Time: 12:45
 */

namespace App\library\Services;


use Illuminate\Support\Facades\Storage;
use Telegram\Bot\Laravel\Facades\Telegram;
use TelegramBot\Api\Client;
use TelegramBot\Api\Types\Message;
use Telegram\Bot\Api;

class DemoOne
{
    protected $bot;

    public function __construct()
    {
        $this->bot = new Client(env('TELEGRAM'));
        $this->telegram = new Api(env('TELEGRAM'));

        $this->doSomethingUseful();
    }

    public function doSomethingUseful()
    {
//        $bot = new \TelegramBot\Api\Client(env('TELEGRAM'));

//        $bot = $this->bot;
//
//// команда для start
//        $bot->command('start', function ($message) use ($bot) {
//            $answer = 'Добро пожаловатьqqqqqqqqq!';
//            $bot->sendMessage($message->getChat()->getId(), $answer);
//            $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup([["Игорь", "Саня", "Евгений"]], true);
//
//            $chatId = '397195914';
//            $messageText = 'test';
//            $bot->sendMessage($chatId, $messageText, null, false, null, $keyboard);
//
//        });
//
//// команда для помощи
//        $bot->command('help', function ($message) use ($bot) {
//            $answer = 'Команды: /help - вывод справкиbbbbb';
//            $bot->sendMessage($message->getChat()->getId(), $answer);
//        });
//
//        $bot->command('hello', function ($message) use ($bot) {
//            $text = $message->getText();
//            $param = str_replace('/hello ', '', $text);
//            $answer = 'Неизвестная команда';
//            if (!empty($param))
//            {
//                $answer = 'Привет, ' . $param;
//            }
//            $bot->sendMessage($message->getChat()->getId(), $answer);
//        });
////        $bot->run();
    }

    public function run()
    {
        $this->bot->run();
    }

}