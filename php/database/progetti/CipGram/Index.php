<?php

    require_once 'config.php';
    require_once 'function.php';

    $website = "https://api.telegram.org/bot$token"; # url di telegram con il nostro token
    $server = "https://b05a-87-10-25-189.eu.ngrok.io/database/progetti/CipGram/"; # url del server da cambiare se è variabile
    
    # set webhook del nostro server
    setWebhook($website."setWebhook".$server);  # url completo del nostro server

    # setta il deleteWebhook in caso non si disponesse di un server
    # deleteWebhook();

    # setta il getUpdates in caso non si usasse il webHook
    # getUpdates();

    $update = file_get_contents('php://input');                 # ricevo i dati dal telegram    
    $update = json_decode($update, true);                       # decodifica il json in un array
    file_put_contents("hook.log", $json . "\n", FILE_APPEND);   # scrivo i dati nel file log se non si usa il webHook

    $markup = null; # variabile per la creazione del di bottoni tramite sql

    $chatId = isset($update['message']['chat']['id']) ? $update['message']['chat']['id'] : null;                     #setto la variabile chatId da ricevere
    $firstname = isset($update['message']['chat']['first_name']) ? $update['message']['chat']['first_name'] : null;  #setto la variabile firstname da ricevere
    $text = isset($update['message']['text']) ? $update['message']['text'] : null;                                   #setto la variabile text da ricevere

    $admin = 129198671;  # setto la variabile admin che è il chatId dell'admin 


    if ($chatId == $admin) { # se il chatId è uguale a quello dell'admin accedi alle funzioni dell'admin
        switch ($text) {     # switch per gestire i comandi da admin
            case '/start':
                sendMessage($chatId, "Ciao admin ".$firstname.", sono il bot di CipGram");
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
                    $immobile = "Nome immobile: ".$immobile['nome']."\nVia: ".$immobile['via']."\nN°Civico: ".$immobile['civico']."\nMetratura: ".$immobile['metratura']."\nPiani: ".$immobile['piano']."\nN°Locali: ".$immobile['nLocali']."\nTipo: ".$immobile['IdTipo']."\nZona: ".$immobile['IdZona']."\n";
                    sendMessage($chatId, $immobile);                        # invio dei dati all'utente
                }
                sendMessage($chatId, "Cosa vuoi fare ora?");
                break;
            case 'Inserisci': #case inserimento immobile
                $replyMarkup = json_encode([
                    'keyboard' => [
                        ['Nome', 'Via', 'Civico', 'metratura'],
                        ['Piano', 'Numero Locali', 'Tipo', 'Zona']
                    ],
                    'resize_keyboard' => true
                ]);
                sendMessage($chatId, "Inserisci i dati", $replyMarkup);
            break;
                break;
            case 'Modifica': # invio dei campi per la modifica di un immobile
                $replyMarkup = json_encode([
                    'keyboard' => [
                        ['Nome', 'Via', 'Civico', 'metratura'],
                        ['Piano', 'Numero Locali', 'Tipo', 'Zona']
                    ],
                    'resize_keyboard' => true
                ]);
                sendMessage($chatId, "Cosa vuoi modificare?", $replyMarkup);
                break;
            case 'Elimina': # case di eliminazione di un immobile
                $sql = "SELECT * FROM immobili";                            # query sql
                $result = $conn->prepare($sql);                             # preparo la query
                $result->execute();                                         # esecuzione della query
                $immobili = $result->fetchAll(PDO::FETCH_ASSOC);            # estrazione dei dati
                $numeroImmobili = generateKeyboardImmobili($immobili);              # generazione dei bottoni
                sendMessage($chatId, "Che immobile vuoi vendere?");
                #venditaImmobile($text);                    # invio dei dati alla funzione venditaImmobile
                break;
            case '/help':
                sendMessage($chatId, "Comandi disponibili:\n/start\n/bottoni\n/video\n/foto\n/help");
            default:
                sendMessage($chatId, "Comando non riconosciuto");
                break;
        }
    } else { # se il chatId non è uguale a quello dell'admin accedi alle funzioni da utente
        switch ($text) { # switch per usare il bot da utente
            case '/start':
                sendMessage($chatId, "Ciao ".$firstname.", sono il bot di CipGram e sono il tuo assistente 
                nella compravendita di immobili");
                break;
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
                sendMessage($chatId, "Che immobile vuoi vendere?");
                venditaImmobileIntest($text); # invio dei dati alla funzione venditaImmobile
                break;
            case 'Compri?': # case per la compra di un immobile
                # generazione dei bottoni in base a quanti immobili sono presenti nel database
                $sql = "SELECT * FROM immobili";                            # query sql
                $result = $conn->prepare($sql);                             # preparo la query
                $result->execute();                                         # esecuzione della query
                $immobili = $result->fetchAll(PDO::FETCH_ASSOC);            # estrazione dei dati
                $numeroImmobili = generateKeyboardImmobili($immobili);              # generazione dei bottoni
                sendMessage($chatId, "Che immobile vuoi comprare?", $numeroImmobili);   # invio dei bottoni all'utente
                break;
            case '/video':
                sendVideo($chatId, "https://www.youtube.com/watch?v=y9j-BL5ocW8"); # il video viene scaricato dall'url e poi caricato tramite la connessione che si ha,  
                break;                                                             # quindi più è lenta la connessione più tardi arriva il video
            case '/foto': 
                sendPhoto($chatId, "https://www.behance.net/gallery/23945059/Stock-Vector-Real-Estate-Logo");   # invio della foto tramite la connessione del server
                break;
            case '/help':
                sendMessage($chatId, "Comandi disponibili:\n/start\n/bottoni\n/video\n/foto\n/help");
            default:
                sendMessage($chatId, "Comando non riconosciuto");
                break;
        }
    }
?>