<?php
    //gmdate("Y-m-d\TH:i:s\Z", $timestamp);
    require_once('config.php');
    require_once('bot-api.php');


    $update = file_get_contents('php://input');
    $update = json_decode($update, true);

    $website = "https://6822-87-10-25-189.eu.ngrok.io/database/progetti/CipGram/index.php"; // url in base da che sito si sta hostando
    
     
    /* $message = isset($update['message']) ? $update['message'] : null; */
    $chatId = isset($update['message']['chat']['id']) ? $update['message']['chat']['id'] : null;
    $first_name = isset($update['message']['chat']['first_name']) ? $update['message']['chat']['first_name'] : null;
    $text = isset($update['message']['text']) ? $update['message']['text'] : null;
    

    try{

        $bot = new TelegramBot($token);             # crea un oggetto bot
        $me = $bot->getMe();                        # Otteniamo i dati del bot (nome, id, etc.)
        $updates = $bot->getUpdates();              # salvo la lista degli update in una variabile
        $setWebhook = $bot->setWebhook($website);   # setto il webhook
        $deleteWebhook = $bot->deleteWebhook();     # rimuovo il webhook

        var_dump($me);                              
        /* var_dump($updates);   */                 # da disattivare se si interagisce con il bot
        // var_dump($deleteWebhook);
        var_dump($setWebhook);                      # stampo il risultato dell'invio del webhook

    }
    catch(ErrorException $e){
        echo $e->getMessage();
    }
    
    switch($text){
        case "/start":
            $bot->start($chatId);
            break;
        case "/immobili":
            $bot->seeImmobili($chatId, $keyboard);
        case "/help":
            $bot->help($chatId);
            break;
        default:
            $bot->sendMessage($chatId, "Non capisco cosa vuoi dire");
            $bot->sendMessage($chatId, "Scrivi /help per avere una lista di comandi");
            break;
    }

?>