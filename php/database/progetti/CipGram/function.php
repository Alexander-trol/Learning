<?php
    require_once 'index.php';


    #funzione di invio messaggi con una replyKeyboardMarkup
    function sendMessage($chatId, $text, $replyMarkup = null) {
        $url = $GLOBALS['website']."/sendMessage";
        $data = [
            'chat_id' => $chatId,
            'text' => $text,
            'reply_markup' => $replyMarkup
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

    #funzione di invio video
    function sendVideo($chatId, $video){
        global $website;
        $url = $website."/sendVideo";
        $data = array(
            "chat_id"=>$chatId,
            "video"=>$video
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
            "caption"=>"Foto inviata da CipGram"
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

?>