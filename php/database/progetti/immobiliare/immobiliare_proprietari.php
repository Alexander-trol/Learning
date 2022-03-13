<?php

include 'components/functions.php';
session_start();

    $sql = "SELECT nome, cognome FROM proprietari";
    $result = $conn->prepare($sql);
    $result->execute();
    $rs = $result->fetchAll();

    $output = '
        <table class="table table-striped">
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Cognome</th>
            </tr>';

    foreach ($rs as $row) {
        $output .= '
            <tr>
                <td>'.$row['nome'].'</td>
                <td>'.$row['cognome'].'</td>
            </tr>    
            ';
            
    }
    
    $output .= '</table>';
    echo $output;

?>
<html>
    <tr>
        <td></td>
    </tr>
</html>