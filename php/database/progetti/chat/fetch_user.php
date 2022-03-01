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
        $output .='
            <tr>
                <td>'.$row['username'].'</td>
                <td></td>
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
<html>
    
</html>