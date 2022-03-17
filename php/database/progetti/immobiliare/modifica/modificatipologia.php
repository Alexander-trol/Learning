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

            $sql = "SELECT * FROM tipoimm WHERE id=$id";
            $result = $conn->prepare($sql);
            $result->execute();
            $rs = $result->fetchAll();

            $output='
                <form class="row g-3" method="POST">
                    <div class="col-md-6">
                        <label for="inputTipo4" class="form-label">Tipo</label>
                        <input type="text" name="tipo" class="form-control" id="tipo" value="\'.$rs[\'id\'].\'">
                    </div>
                    <input type="hidden" name="scelta" value="updatetipologia">
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