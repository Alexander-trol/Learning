<?php
    //Rilevamento errore, se non si capisce l'errore togliere funzione
    //mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $host = "localhost";
    $user = "root";
    $pwd = "";
    $db = "immobiliare";

    $conn = mysqli_connect($host, $user, $pwd, $db);

    if (!$conn) {
        die("<script>alert('Connessione fallita!')</script>"); 
    }
?>