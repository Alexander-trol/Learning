<?php
    require 'components/functions.php';

    if(isset($_SESSION['loggato'])) header('location:index.php?scelta=immobiliare');
    define("USERNAME", "admin");
    define("PASSWORD", "admin");
    
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    
    if(USERNAME == $username && PASSWORD == $password){
        // salvo credenziali in sessione
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;

        // da loggato, vai alla pagina
        header('Location: index.php?scelta=immobiliare');
    }
    else{
        // altrimenti rifai login
        header('Location: index.php?scelta=');
    }
?>