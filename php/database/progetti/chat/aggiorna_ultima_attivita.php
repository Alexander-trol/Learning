<?php
    include('components/function.php');

    session_start();

    $sql = "UPDATE dettagli_login
            SET ultima_attivita	= now()
            WHERE id_dettagli = '".$_SESSION['id_dettagli']."'";
    
    $result = $conn->prepare($sql);
    $result->execute();

    $sql = "SELECT * FROM dettagli_login 
                WHERE id_user = '$id_user'
                ORDER BY ultima_attivita DESC
                LIMIT 1";
        $result = $conn->prepare($sql);
        $result->execute();
        $rs = $result->fetchAll();

        foreach ($rs as $row) {
            return $row['ultima_attivita'];
        }
?>