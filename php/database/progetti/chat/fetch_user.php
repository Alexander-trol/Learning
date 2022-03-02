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
        $accesso_corrente = strtotime(date('d-m-Y H:i:s'). '-10 seconds');
        $accesso_corrente = date('d-m-Y H:i:s', $accesso_corrente);
        $ultima_attivita_utente = fetch_user_ultima_attivita($row['id_user'], $conn);

        if ($ultima_attivita_utente > $accesso_corrente) {
            $stato = '<span class="label label-success">Online</span>';
        }else{
            $stato = '<span class="label label-danger">Offline</span>';
        }
        
        $output .='
            <tr>
                <td>'.$row['username'].'</td>
                <td>'.$stato.'</td>
                <td><button type="button" class="btn btn-info btn-xs start-chat" 
                        data-toiduser="'.$row['id_user'].'" 
                        data-tousername="'.$row['username'].'">Entra
                    </button>
                </td>
            </tr>
        ';
    }

    $output .= '</table>';
    echo $output;
?>