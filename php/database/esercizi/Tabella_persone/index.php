<?php
    require("components/head.html");
    require("components/function.php");

    //Collegamento con mysql
    $db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB);

    //Creazione sintassi di sql per la query
    $sql = "SELECT * FROM persone";

    //Eseguo la quety utilizzando l'oggetto $db
    $rs = $db->query($sql);

    //Estrazione dati grezza
    // $record = $rs->fetch_assoc();
    // while ($record){
    //     echo($record['id']." ".$record['nome']." ".$record['cognome']."<br />");
    //     $record = $rs->fetch_assoc();
    // }

    //Visualizzo i dati in formato BOOTSTRAP
    $sql = "SELECT * FROM persone";
    $rs = $db->query($sql);
    
    echo("<table class=\"table table-striped table-hover\">
        <thead>
            <tr>
                <th scope=\"col\">#</th>
                <th scope=\"col\">Nome</th>
                <th scope=\"col\">Cognome</th>
            </tr>
        </thead>");
        echo("<tbody>");
            $record = $rs->fetch_assoc();
            while ($record) {
                echo("<tr>
                <th scope=\"row\">".$record['id']."</th>
                <td>".$record['nome']."</td>
                <td>".$record['cognome']."</td>
                </tr>");
                $record = $rs->fetch_assoc();
            }
        echo("</tbody>");
    echo("</table>");
    echo("<button type=\"button\" class=\"btn btn-success\">Invia Feedback</button>");
    echo("<button type=\"button\" class=\"btn btn-outline-success\">Invia Feedback</button>");

    //Chiusura collegamento
    $db->close();
    
    require("components/foot.html");
?>