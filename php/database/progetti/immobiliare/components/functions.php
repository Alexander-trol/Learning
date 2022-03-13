<?php
    // funzioni uili
    
    // database scuola
    /* $host = "localhost";
    $db = "in5a02";
    $user = "in5a02";
    $pwd = "in5a02";
    $conn = new PDO("mysql:host=$host; dbname=$db", $user, $pwd); */

    // database casa
    $host = "localhost";
    $db = "immobiliare";
    $user = "root";
    $pwd = "";
    $conn = new PDO("mysql:host=$host; dbname=$db", $user, $pwd);

    // authentication
    define("USERNAME", "admin");
    define("PASSWORD", "admin");
?>