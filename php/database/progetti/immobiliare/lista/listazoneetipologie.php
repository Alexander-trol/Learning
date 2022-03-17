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
                <div class="col-4">
                    <?php
                        $sql = "SELECT * FROM tipozona";
                        $result = $conn->prepare($sql);
                        $result->execute();
                        $rs = $result->fetchAll();
                    
                        $output = '
                            <table class="table table-striped">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Zona</th>
                                </tr>';
                    
                        foreach ($rs as $row) {
                            $output .= '
                                <tr>
                                    <td>'.$row['id'].'</td>
                                    <td>'.$row['zona'].'</td>
                                </tr>    
                                ';
                        }
                        $output .= '</table>';
                        echo $output;

                    ?>
                </div>
                <div class="col-4">
                    <?php
                        $sql = "SELECT * FROM tipoimm";
                        $result = $conn->prepare($sql);
                        $result->execute();
                        $rs = $result->fetchAll();
                    
                        $output = '
                            <table class="table table-striped">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tipo</th>
                                </tr>';
                    
                        foreach ($rs as $row) {
                            $output .= '
                                <tr>
                                    <td>'.$row['id'].'</td>
                                    <td>'.$row['tipo'].'</td>
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