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

    function fetch_user_cronologia_chat($id_user_m, $id_user_r, $conn){
        $sql = "SELECT * FROM chat_messaggi
                WHERE (id_user_m ='".$id_user_m."'
                AND id_user_r = '".$id_user_r."')
                OR (id_user_m ='".$id_user_r."'
                AND id_user_r = '".$id_user_m."')
                ORDER BY timestamp DESC
                ";
        $result = $conn->prepare($sql);
        $result->execute();
        $rs = $result->fetchAll();
        $output = '<ul class="list-unstyled">';
        foreach ($rs as $row) {
            $username= '';
            if ($row["id_user_m"] == $id_user_m) {
                $username = '<b class="text-success">Tu</b>';
            }
            else {
                $username = '<b class="text-danger">'.get_username($row[
                    'id_user_m'], $conn).'</b>';
            }
            $output .= '<li style="border-bottom:1px dotted #ccc">
                            <p>'.$username.' - '.$row["messaggi"].'</p>
                            <div style="text-align: right;">
                                - <small><em>'.$row['orario'].'</em></small>
                            </div>
                        </li>
                        ';
        }
        $output .= '</ul>';
        return $output;
    }

    function get_username($id_user, $conn){
        $sql = "SELECT username FROM login WHERE id_user = '$id_user'";
        $result = $conn->prepare();
        $result->execute();
        $rs = $result->fetchAll();
        foreach ($rs as $row) {
            return $row['username'];
        }
    }
?>