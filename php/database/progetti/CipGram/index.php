<?php
    //gmdate("Y-m-d\TH:i:s\Z", $timestamp);
    require_once('.gitignore/config.php');
    require_once('json-handler.php');
    require_once('bot-api.php');

    $website = "https://api.telegram.org/bot$token/";

    $json = file_get_contents('php://input');
    $update = json_decode($json, true);

    $chatId = $update['message']['chat']['id'];    //id del gruppo o della chat
    $message = $update['message']['text'];         //testo del messaggio

    try{
        $bot = new TelegramBot($token); 
        
        var_dump($bot->getMe());

        //Il link è da cambiare ogni volta che si aggiorna il sito o lo si cambia
        var_dump($bot->setWebhook("https://90d9-87-10-25-189.eu.ngrok.io/json-handler.php"));

        //$bot->deleteWebhook();
    }
    catch(ErrorException $e){
        echo $e->getMessage();
    }

    switch ($message) {
        case 'ciao':
            $bot->ciao($chatId);
        
        default:
            $bot->sendMessage($chatId, $message);
            break;
    }
?>