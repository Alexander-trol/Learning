#DOCUMENTAZIONE DEL BOT DI TELEGRAM CIPGRAM

## index.php
-----------------------------------------------------------------------------------------------------------------
- Struttura del file:

Il file è composto principalmente da due sezioni:

- La prima sezione è la sezione di configurazione del bot con la creazione di variabili quali:

Le variabili $website e $server che servono che permettono di usare il bot con le rispettive API di Telegram.
Le variabili $update che servono a leggere i dati ricevuti dal bot in formato json (che poi verranno decodificati), infatti poi vengono usate per settare i parametri ad esempio $chatid, $text ecc. 
La variabile admin che serve a definire colui che può usare dei comandi particolari per interagire con il database a differenza dell'utente che può fare solo la compravendita.
-----------------------------------------------------------------------------------------------------------------
Ciò ci porta alla seconda sezione dove:

- La seconda sezione è la sezione composta da un if al cui interno c'è il controllo dell'admin che permette l'uso di comandi particolari se è true, mentre se è false, allora l'utente può solo fare la compravendita.

Alcuni di questi comandi sono identici sia per l'admin che per l'utente, ad esempio i comandi:
[/start] che da il benvenuto all'utente o all'admin (ovviamente con due messaggi diversi)
[/bottoni]  che mostra i bottoni nella tastiera del telefono per la compravendita (all'utente) e per le modifiche del database (all'admin)
[/video] che mostra un video di presentazione dell'agenzia
[/foto] che mostra una foto del logo dell'agenzia
[/help] che mostra una descrizione dei comandi disponibili

Altri comandi invece sono disponibili tramite replyKeyboard (tastiera sul telefono) per l'admin e alcuni di questi comandi sono:
[Catalogo] che mostra il catalogo degli immobili presenti nel database 
[Inserisci] che permette di inserire un nuovo immobile nel database
[Modifica] che permette di modificare un immobile già presente nel database
[Elimina] che permette di eliminare un immobile già presente nel database

I comandi sottoforma di tastiera disponibili per l'utente sono:
[Vendi?] che permette di iniziare la vendita di un immobile
[Compri?] che permette di iniziare la compra di un immobile

Alcuni bottoni della tastiera tipo Inserisci, modifica, compri? portano ad un sotto-menu con altri bottoni permettono di selezionare il tipo di immobile da inserire, modificare o comprare.
=================================================================================================================

## functions.php
-----------------------------------------------------------------------------------------------------------------
- Struttura del file:

Il file è composto da tutte quelle funzioni utilizzate in index.php che permettono di eseguire certe zioni particolari. All'interno di questa funzione, ma anche in molte altre (così da non ripetermi), sono presenti: 

Una variabile $url che permette di attaccare il metodo della funzione all'url del sito
Un array $data, con all'interno i parametri delle API di telegram
Un array $options, per la richiesta dei parametri che si vogliono inviare tramite il metodo http_build_query
Una variabile $context, che crea il contesto per la richiesta in base ai parametri presenti in $options
Una variabile $result, che contiene il risultato della richiesta
Ed il return, che ritorna il risultato

Queste funzioni sono:

[sendMessage] con i tre parametri ($chatId, $text, $replyMarkup) che permette di inviare un messaggio al bot e può modificare la tastiera con dei bottoni personalizzati. Se non si h abisono della tastiera si può mettere $replyMarkup = null. 
[sendVideo] con i due parametri ($chatId, $video) che permette di inviare un video al bot.
[sendPhoto] con i due parametri ($chatId, $photo) che permette di inviare una foto al bot.
[generateKeyboardImmobili] con un parametro ($immobili) che permette di generare un array di bottoni personalizzati.
[setWebhook] con un parametro ($url) che permette un interazione in live con il bot
[deleteWebhook] che permette di eliminare l'interazione in live con il bot, ma solo con la funzione getUpdates
[venditaImmobileIntest] con un parametro ($immobile) che elimina l'intestazione della vendita tra immobile e proprietario
[venditaImmobile] con un parametro ($immobile) che elimina l'immobile
[getUpdates] con nessun parametro, che permette di usare il bot senza interazione in live con il bot
=================================================================================================================

## config.php 
-----------------------------------------------------------------------------------------------------------------
- Struttura del file:

Il file è composto da:
Una variabile $token che contiene il token del bot.
4 variabili utilizzate per la connessione al database tramite PDO (permettono di usare le funzioni di PDO) tutto salvato in una variabile $conn.
=================================================================================================================

## fakeWebHook.php
-----------------------------------------------------------------------------------------------------------------

- Struttura del file:

Il file permette di connetterti al database senza l'ausilio del webHook. Purtroppo bisogna ogni volta ricaricare il proprio server per interagire con il bot.
=================================================================================================================

## hook.log
-----------------------------------------------------------------------------------------------------------------

- Struttura del file:

Qui vengono salvati tutti i dati ricevuti dal bot in formato json
=================================================================================================================

## .gitignore
-----------------------------------------------------------------------------------------------------------------

- Struttura del file:

Il file contiene tutti i file che non vengono salvati con il progetto se li si carica ad esempio su github, così da proteggere certe cose che non si vogliono far vedere
=================================================================================================================