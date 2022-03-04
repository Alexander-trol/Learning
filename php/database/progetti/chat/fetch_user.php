<?php
    include('components/function.php');

    session_start();

    $sql = "SELECT * FROM login
            WHERE id_user != '".$_SESSION['id_user']."'";
    $result = $conn->prepare($sql);
    $result->execute();
    $rs= $result->fetchAll();

    $output = '
        <table class="table table-bordered table-striped">
            <tr>
                <td>Username</td>
                <td>Stato</td>
                <td>Azione</td>
            </tr>
    ';

    foreach ($rs as $row) {
        $stato = '';
        $accesso_corrente = strtotime(date('Y-m-d H:i:s') . '-10 second');   
        $accesso_corrente = date('Y-m-d H:i:s', $accesso_corrente);
        $ultima_attivita_utente = fetch_user_ultima_attivita($row['id_user'], $conn);

        if ($ultima_attivita_utente > $accesso_corrente) {
            $stato = '<span class="label label-success">Online</span>';
        }else{                                                          //Non vanno i colori e nemmeno il cambio e nemmno il cambio
            $stato = '<span class="label label-danger">Offline</span>';
        }
        
        $output .='
            <tr>
                <td>'.$row['username'].'</td>
                <td>'.$stato.'</td>
                <td><button id="start_chat "type="button" class="btn btn-info btn-xs start_chat" 
                        data-iduserr="'.$row['id_user'].'" 
                        data-idusernamer="'.$row['username'].'">Entra
                    </button>
                </td>
            </tr>
        ';
    }

    $output .= '</table>';
    echo $output;
?>