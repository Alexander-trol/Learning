<?php

    require_once 'config.php';
    require_once 'function.php';

    $website = "https://api.telegram.org/bot".$token; # url del bot
    $update = file_get_contents('php://input');      
    $update = json_decode($update, true);        # decodifica il json in un array

    $chatId = isset($update['message']['chat']['id']) ? $update['message']['chat']['id'] : null;                #setto la variabile chatId da ricevere
    $text = isset($update['message']['text']) ? $update['message']['text'] : null;                              #setto la variabile text da ricevere
    $video = isset($update['message']['video']['file_id']) ? $update['message']['video']['file_id'] : null;     #setto la variabile video da ricevere

    switch ($text) {
        case '/start':
            sendMessage($chatId, "Ciao, sono il bot di CipGram");
            break;
        case '/bottoni':
            $replyMarkup = json_encode([
                'keyboard' => [
                    ['Vendi?', 'Compri?'],
                    ['Catalogo', 'Inserisci'],
                    ['Modifica', 'Elimina']
                ],
                'resize_keyboard' => true
            ]);
            sendMessage($chatId, "Scegli una voce", $replyMarkup);
            break;
        case 'Catalogo': # estrazione dei dati dalla tabella immobili e mostrali all'utente
            $sql = "SELECT * FROM immobili";                    # query sql
            $result = $conn->prepare($sql);                     # preparo la query
            $result->execute();                                 # esecuzione della query
            $immobili = $result->fetchAll(PDO::FETCH_ASSOC);    # estrazione dei dati
            $immobili = json_encode($immobili);                 # codifica in json
            sendMessage($chatId, $immobili);                    # invio i dati all'utente
            break;
        case 'Inserisci': # fai inserire all'utente da tastiera i dati dell'immobile
            $replyMarkup = json_encode([
                'keyboard' => [
                    ['Vendi?', 'Compri?'],
                    ['Catalogo', 'Inserisci'],
                    ['Modifica', 'Elimina']
                ],
                'resize_keyboard' => true
            ]);
            sendMessage($chatId, "Inserisci i dati dell'immobile", $replyMarkup);
            break;
        case 'Modifica': # invio dei campi per la modifica di un immobile
            $replyMarkup = json_encode([
                'keyboard' => [
                    ['Nome', 'Città', 'Prezzo', 'Tipo'],
                    ['Indirizzo', 'Numero', 'Civico', 'Metri quadri'],
                    ['Latitudine', 'Longitudine', 'Foto', 'Video']
                ],
                'resize_keyboard' => true
            ]);
            sendMessage($chatId, "Inserisci i dati", $replyMarkup);
            break;
        case 'Elimina': # invio dei campi per la eliminazione di un immobile con tramite mysql
            $replyMarkup = json_encode([
                'keyboard' => [
                    ['Nome', 'Città', 'Prezzo', 'Tipo'],
                    ['Indirizzo', 'Numero', 'Civico', 'Metri quadri'],
                    ['Latitudine', 'Longitudine', 'Foto', 'Video']
                ],
                'resize_keyboard' => true
            ]);
            sendMessage($chatId, "Inserisci i dati", $replyMarkup);
            break;
        case 'Vendi?':
            sendMessage($chatId, "Scegli una voce");
            break;
        case 'Compri?':
            sendMessage($chatId, "Scegli una voce");
            break;
        case '/video':
            sendVideo($chatId, "https://www.youtube.com/watch?v=Wch3gJG2GJ4"); # il video viene scaricato dall'url e poi caricato tramite la connessione che si ha,  
            break;                                                             # quindi più è lenta la connessione più tardi arriva il video
        case '/foto':
            sendPhoto($chatId, "https://www.google.it/images/branding/googlelogo/2x/googlelogo_color_272x92dp.png");
            break;
        case '/help':
            sendMessage($chatId, "Comandi disponibili:\n/start\n/bottoni\n/video\n/foto\n/help");
        default:
            sendMessage($chatId, "Comando non riconosciuto");
            break;
    }
?>