<?php
    //Funzioni per il database
    define("MYSQL_HOST", "localhost");
    define("MYSQL_USER", "root");
    define("MYSQL_PASSWORD", "");
    define("MYSQL_DB", "esercizi");

    //Rilevamento errore, se non si capisce l'errore togliere funzione
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); 
?>