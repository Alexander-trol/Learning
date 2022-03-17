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
                    <div class="col-4">
                        <?php
                            $sql = "SELECT nome, cognome FROM proprietari";
                            $result = $conn->prepare($sql);
                            $result->execute();
                            $rs = $result->fetchAll();
                        
                            $output = '
                                <table class="table table-striped">
                                    <tr>
                                        <th>Nome</th>
                                        <th>Cognome</th>
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
                    </div>
                    <div class="col-4">
                        <?php
                            $sql = "SELECT z.zona, t.tipo 
                            FROM tipoimm AS t, tipozona AS z
                            WHERE z.id=t.id";
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
                    </div>
                    <div class="col-4">
                        <?php
                            $sql = "SELECT nome, via FROM immobili";
                            $result = $conn->prepare($sql);
                            $result->execute();
                            $rs= $result->fetchAll();

                            $output = '
                                <table class="table table-striped">
                                    <tr>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Via</th>
                                    </tr>';
                        
                            foreach ($rs as $row) {
                                $output .= '
                                    <tr>
                                        <td>'.$row['nome'].'</td>
                                        <td>'.$row['via'].'</td>
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