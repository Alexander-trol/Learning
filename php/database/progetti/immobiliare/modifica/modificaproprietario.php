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
            <?php
                $CF = $_REQUEST['CF'];

                $sql = "SELECT * FROM proprietari WHERE CF = '$CF'";
                $result = $conn->prepare($sql);
                $result->execute();
                $rs = $result->fetchAll();

                $output = '<form class=\"row g-3\" method=\"POST\">
                        <table class="table table-striped">
                        <tr>
                            <th>CF</th>
                            <th>Nome</th>
                            <th>Cognome</th>
                            <th>Telefono</th>
                            <th>Email</th>
                        </tr>';
        
            foreach ($rs as $row) {
                $output .= '
                    <tr>
                        <td>                   
                            <div class="col-md-10">
                                <input type="text" name="CF" class="form-control" id="CF" value="'.$row['CF'].'" >
                            </div>
                        </td>
                        <td> 
                        <div class="col-md-10">
                            <input type="text" name="nome" class="form-control" id="nome" value="'.$row['nome'].'" >
                        </div>
                        </td>
                        <td>
                            <div class="col-md-1010">
                                <input type="text" name="cognome" class="form-control" id="cognome" value="'.$row['cognome'].'" >
                            </div>
                        </td>
                        <td>
                            <div class="col-md-10">
                                <input type="text" name="telefono" class="form-control" id="telefono" value="'.$row['telefono'].'" >
                            </div>
                        </td>
                        <td>
                            <div class="col-md-10">
                                <input type="text" name="email" class="form-control" id="email" value="'.$row['email'].'" >
                            </div>
                        </td>
                    </tr>    
                    ';
            }
                $output .= '<input type="hidden" name="scelta" value="updateproprietario">
                            <input type="hidden" name="CF" value="'.$CF.'">
                       
                            </table>
                            <div class=\"col-12\">
                                <input type="submit" name="Aggiorna" class="btn btn-primary" value="Aggiorna" />
                            </div>
                        </form>';
                echo $output;
            ?>
        </div>
    </body>
</html>