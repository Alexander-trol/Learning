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

        # funzione che riceve una lista di update e la stampa, da notare che ho aggiunto offset=-1 così da prendere
        #l'ultimo update, altrimenti avrebbe preso il primo update
        public function getUpdates(){
            return json_decode(fetch($this->_getApiMethodUrl("getUpdates?offset=-1"), 'POST'));
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


        #funzione sendmessage(), invia un messaggio al bot tramite ngrok
        public function sendMessage($chatId, $text){
            return json_decode(fetch($this->_getApiMethodUrl("sendMessage"), 'POST', array(
                "chat_id"=>$chatId,
                "text"=>$text
            )));
        }

        #funzione start(), invia un messaggio di benvenuto al bot
        public function start($chatId){
            return $this->sendMessage($chatId, "Ciao, sono il bot di CipGram".PHP_EOL.
                "Per maggiori informazioni scrivi /help");
        }

        #funzione seeImmobili per visualizzare gli immobili disponibili su tastiera sul database immobili.
        public function seeImmobili($chatId, $keyboard){
            return $this->sendMessage($chatId, "Sono disponibili i seguenti immobili:", $keyboard);
        }


        #funzione help(), invia un messaggio di aiuto al bot con i comandi disponibili
        public function help($chatId){
            return $this->sendMessage($chatId, "Comandi disponibili:".PHP_EOL.
                "/start - avvia il bot".PHP_EOL.
                "/immobili - mostra gli immobili disponibili".PHP_EOL.
                "/help - mostra questo messaggio");
        }
    }

?>