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
            <div class="row">
                <div class="col-9">
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
                                    <th>Aquisto</th>
                                    <th>Vendita</th>                                    
                                </tr>';
                    
                        foreach ($rs as $row) {
                            $output .= '
                                <tr>
                                    <td>'.$row['id'].'</td>
                                    <td>'.$row['nome'].'</td>
                                    <td>'.$row['via'].'</td>
                                    <td>
                                        <a href="index.php/?scelta=acquistaimmobile&id='.$row['id'].'">Aquista</a>
                                    </td>
                                    <td>
                                        <a href="index.php/?scelta=vendiimmobile&id='.$row['id'].'">Vendi</a>
                                    </td>
                                </tr>    
                                ';
                        }
                        $output .= '</table>';
                        echo $output;
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>