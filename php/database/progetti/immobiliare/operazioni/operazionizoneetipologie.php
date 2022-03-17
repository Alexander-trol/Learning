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
            <div class="container" style="padding-top: 20px;">
                <div class="row">
                    <div class="col-6">
                        <?php
                            $sql = "SELECT * FROM tipozona";
                            $result = $conn->prepare($sql);
                            $result->execute();
                            $rs = $result->fetchAll();
                        
                            $output = '
                                <table class="table table-striped">
                                    <tr>
                                        <th>#</th>
                                        <th>Zona</th>
                                        <th>Operazioni</th>
                                        <th><a href="./?scelta=aggiungizoneetipologia">Aggiungi</a></th>
                                    </tr>';
                        
                            foreach ($rs as $row) {
                                $output .= '
                                    <tr>
                                        <td>'.$row['id'].'</td>
                                        <td>'.$row['zona'].'</td>
                                        <td>
                                            <a href="index.php/?scelta=eliminazona&id='.$row['id'].'">Elimina</a> &#47;
                                            <a href="index.php/?scelta=modificazona&id='.$row['id'].'">Modifica</a>
                                        </td>
                                        <td></td>
                                    </tr>    
                                    ';
                            }
                            $output .= '</table>';
                            echo $output;
                        ?>
                    </div>
                    <div class="col-6">
                        <?php
                            $sql = "SELECT * FROM tipoimm";
                            $result = $conn->prepare($sql);
                            $result->execute();
                            $rs = $result->fetchAll();
                        
                            $output = '
                                <table class="table table-striped">
                                    <tr>
                                        <th>#</th>
                                        <th>Tipologia</th>
                                        <th>Operazioni</th>
                                        <th><a href="./?scelta=aggiungizoneetipologia">Aggiungi</a></th>
                                    </tr>';
                        
                            foreach ($rs as $row) {
                                $output .= '
                                    <tr>
                                        <td>'.$row['id'].'</td>
                                        <td>'.$row['tipo'].'</td>
                                        <td>
                                            <a href="index.php/?scelta=eliminatipologia&id='.$row['id'].'">Elimina</a> &#47;
                                            <a href="index.php/?scelta=modificatipologia&id='.$row['id'].'">Modifica</a>
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
            </div>
        </div>
    </body>
</html>