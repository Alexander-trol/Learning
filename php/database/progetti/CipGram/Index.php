<?php

    require_once 'config.php';
    require_once 'function.php';

    $website = "https://api.telegram.org/bot$token"; # url di telegram con il nostro token
    $server = "https://75b5-87-10-25-189.eu.ngrok.io/database/progetti/CipGram/"; # url del server da cambiare
    
    # set webhook del nostro server
    setWebhook($website."setWebhook".$server);  # url completo del nostro server

    # setta il deleteWebhook
    # deleteWebhook();

    $update = file_get_contents('php://input');      
    $update = json_decode($update, true);        # decodifica il json in un array

    $chatId = isset($update['message']['chat']['id']) ? $update['message']['chat']['id'] : null;                     #setto la variabile chatId da ricevere
    $firstname = isset($update['message']['chat']['first_name']) ? $update['message']['chat']['first_name'] : null;  #setto la variabile firstname da ricevere
    $text = isset($update['message']['text']) ? $update['message']['text'] : null;                                   #setto la variabile text da ricevere

    $admin = 129198671;  #setto la variabile admin che è il chatId dell'admin 





    if ($chatId == $admin) { # se il chatId è uguale a quello dell'admin
        switch ($text) {    # switch per gestire i comandi da admin
            case '/start':
                sendMessage($chatId, "Ciao admin ".$firstname.", sono il bot di CipGram");
                sendMessage($chatId, $result);
                break;
            case '/bottoni':
                $replyMarkup = json_encode([                            #creo il json per il replyKeyboardMarkup
                    'keyboard' => [                                     #creo il keyboard con i vari bottoni
                        ['Catalogo', 'Inserisci'],
                        ['Modifica', 'Elimina']
                    ],
                    'resize_keyboard' => true                           #se è true il keyboard si ridimensiona
                ]);
                sendMessage($chatId, "Scegli una voce", $replyMarkup);
                break;
            case 'Catalogo': # estrazione dei dati dalla tabella immobili e li si mostra all'all'utente
                $sql = "SELECT * FROM immobili";                            # query sql
                $result = $conn->prepare($sql);                             # preparo la query
                $result->execute();                                         # esecuzione della query
                $immobili = $result->fetchAll(PDO::FETCH_ASSOC);            # estrazione dei dati
                foreach ($immobili as $immobile) {                          # invio degli immobili all'utente tramite un messaggio per immobile
                    $immobile = json_encode($immobile, JSON_PRETTY_PRINT);  # codifica in json dei dati con formattazione "bella"
                    sendMessage($chatId, $immobile);                        # invio dei dati all'utente
                }
                sendMessage($chatId, "Cosa vuoi fare ora?");
                break;
            case 'Inserisci': 
                $replyMarkup = json_encode([
                    'keyboard' => [
                        ['Nome', 'Via', 'Civico', 'metratura'],
                        ['Piano', 'Numero Locali', 'Tipo', 'Zona']
                    ],
                    'resize_keyboard' => true
                ]);
                # uso la funzione insert immobile per inserire i dati nel database
                sendMessage($chatId, "Inserisci i dati", $replyMarkup);
                

            break;
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
                sendMessage($chatId, "Cosa vuoi modificare?", $replyMarkup);
                break;
            case 'Elimina': # invio dei campi per la eliminazione di un immobile con tramite mysql
                $replyMarkup = json_encode([
                    'keyboard' => [
                        ['Nome', 'Città', 'Prezzo', 'Tipo'],
                        ['Indirizzo', 'Numero', 'Civico', 'Metri quadri']
                    ],
                    'resize_keyboard' => true
                ]);
                sendMessage($chatId, "Inserisci i dati", $replyMarkup);
                break;
            case $text: # invia l'ultimo messaggio ricevuto dal bot in formato json
                $agg = json_encode($update, JSON_PRETTY_PRINT);
                sendMessage($chatId, $agg);
            case '/help':
                sendMessage($chatId, "Comandi disponibili:\n/start\n/bottoni\n/video\n/foto\n/help");
            default:
                sendMessage($chatId, "Comando non riconosciuto");
                break;
        }
    } else { # se il chatId non è uguale a quello dell'admin
        switch ($text) { # switch per usare il bot da utente
            case '/bottoni':
                $replyMarkup = json_encode([                            #creo il json per il replyKeyboardMarkup
                    'keyboard' => [                                     #creo il keyboard con i vari bottoni
                        ['Compri?', 'Vendi?']
                    ],
                    'resize_keyboard' => true                           #se è true il keyboard si ridimensiona
                ]);
                sendMessage($chatId, "Scegli una voce", $replyMarkup);
                break;
            case 'Vendi?':  # case per la vendita di un immobile
                switch ($text) {
                    case "SELECT * FROM immobili WHERE nome = '$text'":
                        if ("SELECT * FROM immobili WHERE nome = '$text'") {
                            $sql = "DELETE FROM intestazioni WHERE nome = '?'";
                            $result = $conn->prepare($sql);
                            $result->execute([$text]);
                            sendMessage($chatId, "Immobile venduto"); 
                        } else {
                            sendMessage($chatId, "Immobile non esistente");
                        }
                        break;
                    default:
                        sendMessage($chatId, "Che immobile vuoi vendere?");
                        break;
                }
                break;
            case 'Compri?': #bottoni per la compra di un immobile con prezzo
                $replyMarkup = json_encode([
                    'keyboard' => [
                        ['Prezzo', 'Prezzo +', 'Prezzo -'],
                        ['Prezzo +', 'Prezzo -', 'Prezzo =']
                    ],
                    'resize_keyboard' => true
                ]);
                sendMessage($chatId, "Scegli una voce");
                break;
            case '/video':
                sendVideo($chatId, "https://www.youtube.com/watch?v=y9j-BL5ocW8"); # il video viene scaricato dall'url e poi caricato tramite la connessione che si ha,  
                break;                                                             # quindi più è lenta la connessione più tardi arriva il video
            case '/foto': 
                sendPhoto($chatId, "https://www.behance.net/gallery/23945059/Stock-Vector-Real-Estate-Logo");
                break;
            case $text: # invia l'ultimo messaggio ricevuto dal bot in formato json
                $agg = json_encode($update, JSON_PRETTY_PRINT);
                sendMessage($chatId, $agg);
            case '/help':
                sendMessage($chatId, "Comandi disponibili:\n/start\n/bottoni\n/video\n/foto\n/help");
            default:
                sendMessage($chatId, "Comando non riconosciuto");
                break;
        }
    }
?>