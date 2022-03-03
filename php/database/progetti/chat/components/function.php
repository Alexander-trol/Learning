<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    
</body>
</html>

<?php
    //Rilevamento errore, se non si capisce l'errore togliere funzione
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    
    $conn = new PDO("mysql:host=localhost; dbname=chat", "root", "");

    if (!$conn) {
        die("<script>alert('Connessione fallita!')</script>"); 
    }

    date_default_timezone_set('Europe/Rome');

    function fetch_user_ultima_attivita($id_user, $conn){
        $sql = "SELECT * FROM dettagli_login 
                WHERE id_user = '$id_user'
                ORDER BY ultima_attivita DESC
                LIMIT 1";
        $result = $conn->prepare($sql);
        $result->execute();
        $rs = $result->fetchAll();

        foreach ($result as $row) {
            return $row['ultima_attivita'];
        }
    }
?>