<?php
    //gmdate("Y-m-d\TH:i:s\Z", $timestamp);
    require_once('config.php');
    require_once('json-handler.php');
    require_once('bot-api.php');

    $ngrok = "https://d7a5-87-10-25-189.eu.ngrok.io/json-handler.php"; //ngrok url da cambaire ad ogni url
    
    #isset chatId e message
    if(isset($_POST['chatId']) && isset($_POST['message'])){
        $chatId = $_POST['chatId'];
        $message = $_POST['message'];
    }
    

    try{

        $bot = new TelegramBot($token);             # crea un oggetto bot
        $me = $bot->getMe();                        # Otteniamo i dati del bot (nome, id, etc.)
        $updates = $bot->getUpdates();              # salvo la lista degli update in una variabile
        $setWebhook = $bot->setWebhook($ngrok);     # setto il webhook
        $deleteWebhook = $bot->deleteWebhook();     # rimuovo il webhook

        var_dump($me);
        var_dump($updates);
        /* var_dump($deleteWebhook); */
        var_dump($setWebhook);                      # stampo il risultato dell'invio del webhook

        
    }
    catch(ErrorException $e){
        echo $e->getMessage();
    }

        
    $chatId = $request['message']['chat']['id'];    //id del gruppo o della chat
    $message = $request['message']['text'];         //testo del messaggio

    switch($message){
        case "ciao":
            $bot->start($chatId);
            break;
        case "/help":
            $bot->sendMessage($chatId, $message);
            $bot->sendMessage($chatId, $message);
            break;
        default:
            $bot->sendMessage($chatId, $message);
            $bot->sendMessage($chatId, $message);
            break;
    }

?>