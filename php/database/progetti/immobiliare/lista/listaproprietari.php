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
                                <th>Telefono</th>
                                <th>Email</th>
                                <th></th>
                            </tr>';
                
                    foreach ($rs as $row) {
                        $output .= '
                            <tr>
                                <td>'.$row['CF'].'</td>
                                <td>'.$row['nome'].'</td>
                                <td>'.$row['cognome'].'</td>
                                <td>'.$row['telefono'].'</td>
                                <td>'.$row['email'].'</td>
                                <td>
                                    <a href="index.php/?scelta=visualizzapdf&CF='.$row['CF'].'">PDF</a>
                                </td>
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