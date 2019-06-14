<?php

namespace App\Http\Controllers;

use App\Account;
use App\Game;
use App\library\Services\DemoOne;
use Illuminate\Http\Request;
use Telegram\Bot\Api;

class TelegramController extends Controller
{


    public function index()
    {
//        logger($request->all());
//        $customServiceInstance->run();

        $telegram
            = new Api('token'); //Устанавливаем токен, полученный у BotFather

        $result
            = $telegram->getWebhookUpdates(); //Передаем в переменную $result полную информацию о сообщении пользователя


        $text = $result["message"]["text"]; //Текст сообщения

        $chat_id = $result["message"]["chat"]["id"]; //Уникальный идентификатор пользователя

//        $name = $result["message"]["from"]["username"]; //Юзернейм пользователя
        $account = Account::all();
        $keyboard = [["Игры\xF0\x9F\x98\x8D"]]; //Клавиатура
        $keyboard2 = [["\xE2\x96\xB6dota"], ["\xE2\x96\xB6gta5"], ["\xE2\x96\xB6fifa"]]; //Клавиатура
        $keyboard3 = [["1-999"], ["1000-1999"], ["2000-2999"], ["3000-3999"], ["4000+"]]; //Клавиатура


        if ($text) {

            if ($text == "/start") {

                $reply = "Добро пожаловать в бота!";

                $reply_markup = $telegram->replyKeyboardMarkup([
                    'keyboard' => $keyboard,
                    'resize_keyboard' => true,
                    'one_time_keyboard' => false
                ]);

                $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);

            } elseif ($text == "Игры\xF0\x9F\x98\x8D") {


                $reply_markup = $telegram->replyKeyboardMarkup([
                    'keyboard' => $keyboard2,
                    'resize_keyboard' => true,
                    'one_time_keyboard' => false
                ]);

                $telegram->sendMessage([
                    'chat_id' => $chat_id,
                    'text' => "выберите игру",
                    'reply_markup' => $reply_markup
                ]);


            } elseif ($text == "\xE2\x8F\xA9dota") {

                $reply_markup = $telegram->replyKeyboardMarkup([
                    'keyboard' => $keyboard3,
                    'resize_keyboard' => true,
                    'one_time_keyboard' => false
                ]);

                $telegram->sendMessage([
                    'chat_id' => $chat_id,
                    'text' => "выберите рейтинг",
                    'reply_markup' => $reply_markup
                ]);
//
//                foreach ($account as $repl)
//
//                    if ($repl->games_id == 1 )
//                $telegram->sendPhoto([  'chat_id' => $chat_id, 'photo' => $repl->photo, 'caption' => $repl = $repl->name . " - " . $repl->description]);
            } elseif ($text == '1-999') {
                foreach ($account as $repl) {
                    if ($repl->games_id == 1 && $repl->description < '999') {
                            $telegram->sendPhoto([
                                'chat_id' => $chat_id,
                                'photo' => $repl->photo,
                                'caption' => $repl = $repl->name . " - " . $repl->description
                            ]);
                        }
                }
            } elseif ($text == '1000-1999') {
                foreach ($account as $repl) {
                    if ($repl->games_id == 1 && $repl->description > 1000 && $repl->description < 1999 ) {
                        $telegram->sendPhoto([
                            'chat_id' => $chat_id,
                            'photo' => $repl->photo,
                            'caption' => $repl = $repl->name . " - " . $repl->description
                        ]);
                    }
                }
            } elseif ($text == '2000-2999') {
                foreach ($account as $repl) {
                    if ($repl->games_id == 1 && $repl->description > 2000 && $repl->description < 2999 ) {
                        $telegram->sendPhoto([
                            'chat_id' => $chat_id,
                            'photo' => $repl->photo,
                            'caption' => $repl = $repl->name . " - " . $repl->description
                        ]);
                    }
                }
            } elseif ($text == '3000-3999') {
                foreach ($account as $repl) {
                    if ($repl->games_id == 1 && $repl->description > 3000 && $repl->description < 3999 ) {
                        $telegram->sendPhoto([
                            'chat_id' => $chat_id,
                            'photo' => $repl->photo,
                            'caption' => $repl = $repl->name . " - " . $repl->description
                        ]);
                    }
                }
            } elseif ($text == '4000+') {
                foreach ($account as $repl) {
                    if ($repl->games_id == 1 && $repl->description > 4000 ) {
                        $telegram->sendPhoto([
                            'chat_id' => $chat_id,
                            'photo' => $repl->photo,
                            'caption' => $repl = $repl->name . " - " . $repl->description
                        ]);
                    }
                }
        } elseif ($text == "gta5") {

            foreach ($account as $repl) {
                if ($repl->games_id == 2) {
                    $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $repl->name]);
                }
            }

        } elseif ($text == "fifa") {

            foreach ($account as $repl) {
                if ($repl->games_id == 3) {
                    $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $repl->name]);
                }
            }


        } else {

            $reply = "По запросу \"<b>" . $text . "</b>\" ничего не найдено.";

            $telegram->sendMessage(['chat_id' => $chat_id, 'parse_mode' => 'HTML', 'text' => $reply]);

        }

    }else
{

$telegram->sendMessage(['chat_id' => $chat_id, 'text' => "Отправьте текстовое сообщение."]);

}


//        return $customServiceInstance->doSomethingUseful();
}

}
