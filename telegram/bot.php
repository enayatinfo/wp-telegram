<?php

/**
 * Created by IntelliJ IDEA.
 * User: usef
 * Date: 2017-02-17
 * Time: 21:21
 */

class bot
{
    //set webhook url for handle updates
    public function setHook()
    {
        //ngrok url for test webhook in local dev
        //$hook = 'https://63be2f3f.ngrok.io/wp-json/telebot/v1/hook';
        $hook = rest_url().'telebot/v1/hook';
        $log = $this->api('setWebhook',[
            [
            'url' => $hook
                ]
        ]);
        dd($log);

    }

    //Call telegram methods
    public function __call($func, $params = []){

        return $this->api($func,$params);
    }
    public function api($function,$params = [],$post = true){
        $telegram_token = get_option('telegram_token');
        $url = 'https://api.telegram.org/bot'. $telegram_token .'/'. $function;
        $curl = array(
            CURLOPT_HEADER         => false,
            CURLOPT_RETURNTRANSFER => true,   // return web page
            CURLOPT_POST           => $post,  // post method
            CURLOPT_POSTFIELDS     => $params[0]// data
        );
        $cnn = curl_init($url);
        curl_setopt_array($cnn, $curl);
        $resp = curl_exec($cnn);
        curl_close($cnn);
        return $resp;
    }

}