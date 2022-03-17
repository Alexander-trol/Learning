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
                
                $id = $_REQUEST['id'];

                $sql = "SELECT * FROM immobili WHERE id = '$id'";
                $result = $conn->prepare($sql);
                $result->execute();
                $rs = $result->fetchAll();

                $output = '<form class=\"row g-3\" method=\"POST\">
                        <table class="table table-striped">
                        <tr>
                            <th>Nome</th>
                            <th>Via</th>
                            <th>Civico</th>
                            <th>Metratura</th>
                            <th>Piani</th>
                            <th>Locali</th>
                        </tr>';
        
                foreach ($rs as $row) {
                    $output .= '
                        <tr>
                            <td>                   
                                <div class="col-md-10">
                                    <input type="text" name="nome" class="form-control" id="nome" value="'.$row['nome'].'" >
                                </div>
                            </td>
                            <td> 
                            <div class="col-md-10">
                                <input type="text" name="via" class="form-control" id="via" value="'.$row['via'].'" >
                            </div>
                            </td>
                            <td>
                                <div class="col-md-1010">
                                    <input type="text" name="civico" class="form-control" id="civico" value="'.$row['civico'].'" >
                                </div>
                            </td>
                            <td>
                                <div class="col-md-10">
                                    <input type="text" name="metratura" class="form-control" id="piano" value="'.$row['metratura'].'" >
                                </div>
                            </td>
                            <td>
                                <div class="col-md-10">
                                    <input type="text" name="piano" class="form-control" id="piano" value="'.$row['piano'].'" >
                                </div>
                            </td>
                            <td>
                                <div class="col-md-10">
                                    <input type="text" name="nLocali" class="form-control" id="nLocali" value="'.$row['nLocali'].'" >
                                </div>
                            </td>
                        </tr>    
                    ';
                }
                    $output .= '<input type="hidden" name="scelta" value="updateimmobile">
                                <input type="hidden" name="id" value="'.$id.'">
                        
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