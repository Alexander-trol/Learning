<?php
    include('components/function.php');

    session_start();
    $sql = "SELECT * FROM login
            WHERE id_user != '".$_SESSION['id_user']."'";
    $result = $conn->prepare($sql);
    $result->execute();
    $rs= $result->fetchAll();

    $output = '
        <table>
            <tr id="tr">
                <td id="td">Username</td>
                <td id="td">Stato</td>
                <td id="td">Azione</td>
            </tr>
    ';

    foreach ($rs as $row) {
        $stato = '';
        $accesso_corrente = strtotime(date('Y-m-d H:i:s') . '-10 second');   
        $accesso_corrente = date('Y-m-d H:i:s', $accesso_corrente);
        $ultima_attivita_utente = fetch_user_ultima_attivita($row['id_user'], $conn);

        if ($ultima_attivita_utente > $accesso_corrente) {
            $stato = '<span class="success">Online</span>';
        }else{                                                          //Non vanno i colori e nemmeno il cambio e nemmno il cambio
            $stato = '<span class="danger">Offline</span>';
        }
        
        $output .='
            <tr id="tr">
                <td id="td">'.$row['username'].'</td>
                <td id="td">'.$stato.'</td>
                <td id="td"><button id="start_chat "type="button" class="buttont start_chat" 
                        data-iduserr="'.$row['id_user'].'" 
                        data-idusernamer="'.$row['username'].'">Entra
                    </button>
                    <br>
                </td>
            </tr>
        ';
    }

    $output .= '</table>';
    echo $output;
?>

<html>
    <head>
    <link rel="stylesheet" href="index.css">
    </head>
    <body>
        
    </body>
</html>