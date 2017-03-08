<?php
/**
 * Created by IntelliJ IDEA.
 * User: usef
 * Date: 2017-02-18
 * Time: 11:10
 */
require_once 'bot.php';

//Handle Telegram updates
function TelegramHandle($update){

    if(isset($update['message']['entities'])) {
        foreach ($update['message']['entities'] as $entities) {
            switch ($entities['type']) {
                case 'bot_command': //if update is bot command
                    $text = explode('/', $update['message']['text']); //command

                    break;
            }
        }
    }
    //if update is callback query
    if(isset($update['callback_query'])){

    }

    if(!isset($update['message']['entities']) && !isset($update['callback_query']))
    {
        global $helpers;
        //if update is keyboard action
        if(in_array($update['message']['text'],$helpers['keys']))
        {

        }
        //if update is message
        else{
        }
    }
}
