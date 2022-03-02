<?php
    include('components/function.php');

    session_start();

    $sql = "UPDATE dettagli_login
            SET ultima_attivita = ora()
            WHERE id_dettagli = '".$_SESSION['id_dettagli']."'";
    $result = $conn->prepare($sql);
    $result->execute();
    
?>