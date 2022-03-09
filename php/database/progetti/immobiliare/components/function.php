<?php
    $host = "localhost";
    $db = "immobiliare";
    $user = "root";
    $pwd = "";
    $conn = new PDO("mysql:host=$host; dbname=$db", $user, $pwd);

    if (!$conn) {
        die("<script>alert('Connessione fallita!')</script>"); 
    }
?>