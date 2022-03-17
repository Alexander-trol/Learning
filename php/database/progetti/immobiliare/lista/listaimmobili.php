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
            <div>
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
                                <th>N°Civico</th>
                                <th>Metratura</th>
                                <th>Piano</th>
                                <th>N°Locali</th>
                            </tr>';
                
                    foreach ($rs as $row) {
                        $output .= '
                            <tr>
                                <td>'.$row['id'].'</td>
                                <td>'.$row['nome'].'</td>
                                <td>'.$row['via'].'</td>
                                <td>'.$row['civico'].'</td>
                                <td>'.$row['metratura'].'</td>
                                <td>'.$row['piano'].'</td>
                                <td>'.$row['nLocali'].'</td>
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