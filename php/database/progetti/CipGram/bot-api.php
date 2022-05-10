<?php
    require_once('fetch-api.php');
    require_once('config.php');
    require_once('index.php');
  
    class TelegramBot {

        protected $botId;

        

        function __construct($botId){
        $this->botId = $botId;
        }

        private function  _getApiMethodUrl($methodName){
        return "https://api.telegram.org/bot$this->botId/$methodName";
        }

        public function getMe(){
        return json_decode(fetch($this->_getApiMethodUrl("getMe"), 'POST'));
        }

        public function getUpdates(){
        return json_decode(fetch($this->_getApiMethodUrl("getUpdates"), 'POST'));
        }

        //Funzione setWebhook() usata se si hanno siti per hostare
        public function setWebhook($url){
        return json_decode(fetch($this->_getApiMethodUrl("setWebhook"), 'POST', array(
            "url"=>$url
        )));
        }

        //Funzione deleteWebhook() usata se non si hanno siti per hostare
        public function deleteWebhook(){
        return json_decode(fetch($this->_getApiMethodUrl("deleteWebhook"), 'POST'));
        }

        //Funzione sendMessage(), usata per l'invio di messaggi
        public function sendMessage($chatId, $message){
            return json_decode(fetch($this->_getApiMethodUrl("sendMessage"), 'POST', array(
                "chat_id"=>$chatId,
                "text"=>$message
            )));
        }

        //Funzione ciao(), usata per l'invio di messaggi di benvenuto
        public function start($chatId){
            $message = "Ciao, sono il bot di CipGram.\n";
            $message .= "Per maggiori informazioni scrivi /help";
            $this->sendMessage($chatId, $message);
        }
    }

?>