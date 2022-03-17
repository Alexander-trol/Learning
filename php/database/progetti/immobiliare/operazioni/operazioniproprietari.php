<?php
include 'components/functions.php';
?>

<html>
    <head>
    </head>
    <body>
        <div class="container ">
            <?php
                include 'navbar.php';
            ?>
            <div class="table-responsive">
                <?php
                    $sql = "SELECT * FROM proprietari";
                    $result = $conn->prepare($sql);
                    $result->execute();
                    $rs = $result->fetchAll();
                
                    $output = '
                        <table class="table table-striped">
                            <tr>
                                <th>CF</th>
                                <th>Nome</th>
                                <th>Cognome</th>
                                <th>Operazioni</th>
                                <th><a href="./?scelta=aggiungiproprietario">Aggiungi</a></th>
                            </tr>';
                
                    foreach ($rs as $row) {
                        $output .= '
                            <tr>
                                <td>'.$row['CF'].'</td>
                                <td>'.$row['nome'].'</td>
                                <td>'.$row['cognome'].'</td>
                                <td>
                                    <a href="index.php/?scelta=eliminaproprietario&CF='.$row['CF'].'">Elimina</a> &#47;
                                    <a href="index.php/?scelta=modificaproprietario&CF='.$row['CF'].'">Modifica</a>
                                </td>
                                <td></td>
                            </tr>    
                            ';
                    }
                    $output .= '</table>';
                    echo $output;
                ?>
            </div>
        </div>
    </body>
</html>