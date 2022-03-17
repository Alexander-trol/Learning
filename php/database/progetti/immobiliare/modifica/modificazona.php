<?php
include 'components/functions.php';
?>

<html>
    <div class="container">
        <?php
            include 'navbar.php';
        ?>
        <?php
            $id = $_REQUEST['id'];

            $sql = "SELECT * FROM tipozona WHERE id=$id";
            $result = $conn->prepare($sql);
            $result->execute();
            $rs = $result->fetchAll();

            $output='
                <form class="row g-3" method="POST">
                    <div class="col-md-6">
                        <label for="inputZona4" class="form-label">Zona</label>
                        <input type="text" name="zona" class="form-control" id="zona" value="\'.$rs[\'id\'].\'">
                    </div>
                    <input type="hidden" name="scelta" value="updatezona">
                    <input type="hidden" name="id" value="'.$id.'">
                    <div class="col-7">
                        <input type="submit" name="Aggiorna" class="btn btn-primary" value="Aggiorna" />
                    </div>
                </form>
            ';
            echo $output;
        ?>
    </div>
</html>