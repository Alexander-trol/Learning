<?php
    require_once 'index.php';


    #funzione di invio messaggi con una replyKeyboardMarkup
    function sendMessage($chatId, $text, $replyMarkup = null) {
        $url = $GLOBALS['website']."/sendMessage";  
        $data = [                           # creo l'array per la richiesta con i parametri che voglio inviare
            'chat_id' => $chatId,           # parametro chat_id
            'text' => $text,                # parametro text
            'reply_markup' => $replyMarkup  # parametro reply_markup
        ];
        $options = [ 
            'http' => [ 
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",  # uso x-www-form-urlencoded essendo che devo inviare del testo via POST e non del codice binario
                'method' => 'POST',                                                 # imposto il metodo di invio
                'content' => http_build_query($data)                                # imposto i dati da inviare
            ]
        ];
        $context = stream_context_create($options);                                 # creo il contesto per la richiesta in base ai parametri presenti in $options
        $result = file_get_contents($url, false, $context);                         # invio la richiesta
        return $result;                                                             # restituisco il risultato della richiesta
    }

    #funzione di invio video
    function sendVideo($chatId, $video){
        global $website;
        $url = $website."/sendVideo";
        $data = array(
            "chat_id"=>$chatId,
            "video"=>$video,
            "caption"=>"Video di presentazione della nostra agenzia"
        );
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        return $result;
    }

    #funzione di invio foto
    function sendPhoto($chatId, $photo){
        global $website;
        $url = $website."/sendPhoto";
        $data = array(
            "chat_id"=>$chatId,
            "photo"=>$photo,
            "caption"=>"Il nostro logo"
        );
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        return $result;
    }

    # settare il webhook con la funzione setWebhook che funziona solo una volta
    function setWebhook($url) {
        $url = $GLOBALS['website']."/setWebhook?url=".$GLOBALS['server'];
        $data = [
            'url' => $url
        ];
        $options = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            ]
        ];
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        return $result;
    }

    # funzione per il deleteWebhook
    function deleteWebhook() {
        $url = $GLOBALS['website']."/deleteWebhook";
        $data = [
            'url' => $GLOBALS['server']
        ];
        $options = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            ]
        ];
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        return $result;
    }
?>