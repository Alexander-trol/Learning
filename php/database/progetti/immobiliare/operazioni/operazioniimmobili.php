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
                    $sql = "SELECT * FROM immobili";
                    $result = $conn->prepare($sql);
                    $result->execute();
                    $rs = $result->fetchAll();
                
                    $output = '
                        <table class="table table-striped">
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Via</th>
                                <th>Operazioni</th>
                                <th><a href="./?scelta=aggiungiimmobile">Aggiungi</a></th>
                            </tr>';
                
                    foreach ($rs as $row) {
                        $output .= '
                            <tr>
                                <td>'.$row['id'].'</td>
                                <td>'.$row['nome'].'</td>
                                <td>'.$row['via'].'</td>
                                <td>
                                    <a href="index.php/?scelta=eliminaimmobile&id='.$row['id'].'">Elimina</a> &#47;
                                    <a href="index.php/?scelta=modificaimmobile&id='.$row['id'].'">Modifica</a>
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