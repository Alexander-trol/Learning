<?php

include 'components/functions.php';
session_start();

    $sql = "SELECT z.zona, t.tipo FROM tipoimm AS t, tipozona AS z";
    $result = $conn->prepare($sql);
    $result->execute();
    $rs = $result->fetchAll();

    $output = '
        <table class="table table-striped">
            <tr>
                <th scope="col">Zona</th>
                <th scope="col">Tipo</th>
            </tr>';

    foreach ($rs as $row) {
        $output .= '
            <tr>
                <td>'.$row['zona'].'</td>
                <td>'.$row['tipo'].'</td>
            </tr>    
            ';
            
    }
    
    $output .= '</table>';
    echo $output;
?>