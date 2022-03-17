<?php
include 'components/functions.php';


$messaggio = '';

if (isset($_POST["Invia1"])) {
    $zona = trim($_POST["zona"]);

    $controllo_sql = "SELECT * FROM tipozona 
                    WHERE zona = :zona";
    $result = $conn->prepare($controllo_sql);
    $controllo_dati = array(
        ':zona' => $zona
    );
    if ($result->execute($controllo_dati)) {
        if ($result->rowCount() > 0) {
            $messaggio .= '<div class="alert alert-danger" role="alert">Zona già esistente</div>';
        }
        else {
            if(empty($zona)) {
                $messaggio .= '<div class="alert alert-danger" role="alert">Zona richiesta</div>';
            }
            if ($messaggio == '') {
                $data = array(
                    ':zona' => $zona
                );

                $sql = "INSERT INTO tipozona(zona) VALUES ('$zona')";
                $result = $conn->prepare($sql);
                if ($result->execute($data)) {
                    $messaggio = "<label>Aggiunta Zona avvenuta con successo!</label>";
                }
            }
        }
    }
}
if (isset($_POST["Invia2"])) {
    $tipo = trim($_POST["tipo"]);

    $controllo_sql = "SELECT * FROM tipoimm 
                    WHERE tipo = :tipo";
    $result = $conn->prepare($controllo_sql);
    $controllo_dati = array(
        ':tipo' => $tipo
    );
    if ($result->execute($controllo_dati)) {
        if ($result->rowCount() > 0) {
            $messaggio .= '<div class="alert alert-danger" role="alert">Tipo già esistente</div>';
        }
        else {
            if(empty($tipo)) {
                $messaggio .= '<div class="alert alert-danger" role="alert">Tipologia richiesta</div>';
            }
            if ($messaggio == '') {
                $data = array(
                    ':tipo' => $tipo
                );

                $sql = "INSERT INTO tipoimm(tipo) VALUES ('$tipo')";
                $result = $conn->prepare($sql);
                if ($result->execute($data)) {
                    $messaggio = "<label>Aggiunta Tipologia avvenuta con successo!</label>";
                }
            }
        }
    }
}
?>

<html>
    <div class="container">
        <?php
            include 'navbar.php';
        ?>
        <form class="row g-3" method="POST">
            <div class="col-md-6">
                <label for="inputZona4" class="form-label">Zona</label>
                <input type="text" name="zona" class="form-control" id="zona" placeholder="Zona">
            </div>
            <div class="col-md-6">
                <label for="inputTipo4" class="form-label">Tipo</label>
                <input type="text" name="tipo" class="form-control" id="tipo" placeholder="Tipo">
            </div>
            <div class="col-6">
                <input type="submit" name="Invia1" class="btn btn-primary" value="Invia" />
            </div>
            <div class="col-6">
                <input type="submit" name="Invia2" class="btn btn-primary" value="Invia " />
            </div>
        </form>
    </div>
</html>