<?php
    require("components/head.html");
    require("components/function.php");

    echo("<ul class=\"nav\">
        <li class=\"nav-item\"><a class=\"nav-link active\" aria-current=\"page\" href=\"index.php\">Visualizza lista persone</a></li>
        <li class=\"nav-item\"><a class=\"nav-link\" href=\"index.php?scelta=formPersona\">Aggiungi persone</a></li>
    </ul>");

    // Codice per la crezione della switch-case con i vari case per le operazioni
    if(isset($_REQUEST['scelta'])) $sc = $_REQUEST['scelta'];
    else $sc = null;

    switch ($sc) {
        //Case per il passaggio per l'inserimento dati persona in addPersona
        case 'formPersona':
            echo("<form action=\"index.php\" method=\"post\>
                <label for=\"campo_1\" class=\"form-label\">Nome:</label>
                <input class=\"form-control\" type=\"text\" id=\"campo_1\" name=\"nomeP\" placeholder=\"Default input\" aria-label=\"default input example\">
                <label for=\"campo_2\" class=\"form-label\">Cognome:</label>
                <input class=\"form-control\" type=\"text\" id=\"campo_2\" name=\"cognomeP\" placeholder=\"Default input\" aria-label=\"default input example\">
                <input type=\"hidden\" name=\"scelta\" value=\"addPersona\">
                <br />
                <button type=\"submit\" class=\"btn btn-primary\">Aggiungi al Database</button>
            </form>");
            break;
        //
        case 'addPersona':
            $nome = $_REQUEST['nomeP'];
            $cognome = $_REQUEST['cognomeP'];

            $db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB);
            $sql = "INSERT INTO persone(nome, cognome) VALUES('nome','cognome')";

            if ($db->query($sql)) {echo("Inserimento avvenuto!!!");}
            else {echo("Errore nell'inserimento... :/");}

            $db->close();
            break;
        case 'deletePersona':
            $idp = $_REQUEST['id_persona'];
            echo("Voglio cancellare questo record con id: $idp");

            $db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB);

            $sql = "DELETE FROM persone WHERE id=$idp";
            echo("<br> $idp");

            if ($db->query($sql)) {echo("Cancellazione effettuata!!!");}
            else {echo("Problema durante la cancellazione... :/");}

            $db->close();
            break;
        default:
            //Apertura database
            $db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB);
            $sql = "SELECT * FROM persone";
            $rs = $db->query($sql);

            echo("<table class=\"table table-success table-striped table-hover\">
                    <thead>
                    <tr>
                        <th scope=\"col\">#</th>
                        <th scope=\"col\">Nome</th>
                        <th scope=\"col\">Cognome</th>
                        <th scope=\"col\">Gestione</th>
                    </tr>
                </thead>");
                echo("<tbody>");
                //Prendere i valori con fetch_assoc ed assegnarli a $record
                $record = $rs->fetch_assoc();

                while ($record) {
                    echo("<tr>
                        <th scope=\"row\">".$record['id']."</th>
                        <td scope=\"col\">".$record['nome']."</td>
                        <td scope=\"col\">".$record['cognome']."</td>
                        <td>
                        <a href=\"index.php?scelta=deletePersona&id_persona=".$record['id']."\">Delete</a> | 
                        <a href=\"index.php?scelta=formModifica&id_persona=".$record['id']."\">Modifica</a>
                    </tr>");
                    //Chiusura dell'invio dati (creerebbe un loop sennò)
                    $record = $rs->fetch_assoc();
                }
                
                echo("</tbody>");
                echo("<caption>Tabella 'persone' su DB scuola2021</caption>");
            echo("</table>");
            //Chiusura database
            $db->close();
            break;
    }


    require("components/foot.html");
?>