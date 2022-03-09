<?php
    include('components/function.php');

    session_start();
    $sql = "SELECT * FROM login
            WHERE id != '".$_SESSION['id']."'";
    $result = $conn->prepare($sql);
    $result->execute();
    $rs= $result->fetchAll();

    $output = '
        <table class="table">
            <thead>
                <tr>
                    <td>Propietario</td>
                    <td>Immobile</td>
                    <td>Tipo</td>
                    <td>Zona</td>
                </tr>
            </thead>
    ';

    foreach ($rs as $row) {
        $output .='
            <tr>
                <td>'.$row['username'].'</td>
                <td></td>
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