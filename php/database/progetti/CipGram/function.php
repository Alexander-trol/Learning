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
        global $website;                                                            # uso la variabile globale $website
        $url = $website."/sendVideo";
        $data = array(
            "chat_id"=>$chatId,
            "video"=>$video,
            "caption"=>"Video di presentazione della nostra agenzia"                # descrizione del video
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

    #funzione della tastiera che genera tanti bottoni in base a quanti immobili sono presenti nella tabella immobili
    function generateKeyboardImmobili($immobili){
        $keyboard = array();
        foreach($immobili as $immobile){             # ciclo sugli immobili
            $keyboard[] = array($immobile['nome']);  # creo un array con il campo della tabella nome di ogni immobile
        }
        $replyMarkup = array(
            'keyboard' => $keyboard,                 # imposto la tastiera
            'resize_keyboard' => true,               # imposto il parametro resize_keyboard a true per far si che la tastiera si ridimensioni in base a quanti bottoni ci sono
            'one_time_keyboard' => true              # se true il tasto viene rimosso dopo che è stato premuto
        );
        return json_encode($replyMarkup);            # restituisco il json della tastiera
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

    # funzione vendita immobile tramite query SQL DELETE
    function venditaImmobileIntest($immobile){
        $sql = "DELETE FROM immobili, intestazioni WHERE immobili.id = immobile.$immobile AND intestazioni.idImmob = immobile.id";
        $result = $GLOBALS['conn']->prepare($sql);
        $result->execute([$immobile]);
        return $result;
    }

    # funzione per la vendita di un immobile tramite query SQL DELETE
    function venditaImmobile($immobile){
        $sql = "DELETE FROM immobili WHERE nome = ?";
        $result = $GLOBALS['conn']->prepare($sql);
        $result->execute([$immobile]);
        return $result;
    }

    # funzione getUpdates che mostra i risultati del json
    function getUpdates(){
        $url = $GLOBALS['website']."/getUpdates";
        $data = [
            'offset' => $GLOBALS['last_update']
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