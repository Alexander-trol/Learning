<?php
include 'components/functions.php';


$messaggio = '';

if (isset($_POST["Invia"])) {
    $nome = trim($_POST["nome"]);
    $via = trim($_POST["via"]);
    $civico = trim($_POST['civico']);
    $metratura = trim($_POST['metratura']);
    $piano = trim($_POST['metratura']);
    $locali = trim($_POST['nLocali']);
    $tipo = trim($_POST['tipo']);
    $zona = trim($_POST['zona']);

    $controllo_sql = "SELECT * FROM immobili 
                    WHERE nome = :nome";
    $result = $conn->prepare($controllo_sql);
    $controllo_dati = array(
        ':nome' => $nome
    );
    if ($result->execute($controllo_dati)) {
        if ($result->rowCount() > 0) {
            $messaggio .= '<div class="alert alert-danger" role="alert">Immobile già esistente</div>';
        }
        else {
            if(empty($nome)) {
                $messaggio .= '<div class="alert alert-danger" role="alert">Nome richiesto</div>';
            }
            if(empty($via)) {
                $messaggio .= '<div class="alert alert-danger" role="alert">Via richiesta</div>';
            }
            if(empty($civico)) {
                $messaggio .= '<div class="alert alert-danger" role="alert">Numero Civico richiesto</div>';
            }
            if(empty($metratura)) {
                $messaggio .= '<div class="alert alert-danger" role="alert">Metratura richiesta</div>';
            }
            if(empty($piano)) {
                $messaggio .= '<div class="alert alert-danger" role="alert">Piani richiesti</div>';
            }
            if(empty($locali)) {
                $messaggio .= '<div class="alert alert-danger" role="alert">Locali richiesti</div>';
            }
            if ($messaggio == '') {
                $data = array(
                    ':nome' => $nome,
                    ':via' => $via,
                    ':civico' => $civico,
                    ':metratura' => $metratura,
                    ':piano' => $piano,
                    ':nLocali' => $locali,
                    ':tipo' => $tipo,
                    ':zona' => $zona
                );

                $sql = "INSERT INTO immobili(nome, via, civico, metratura, piano, nLocali, IdTipo, IdZona)
                VALUES ('$nome', '$via', '$civico', '$metratura', '$piano', '$locali', '$tipo', '$zona')";
                $result = $conn->prepare($sql);
                if ($result->execute($data)) {
                    $messaggio = "<label>Aggiunta Immobile avvenuto con successo!</label>";
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
                <label for="inputNome4" class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome" required>
            </div>
            <div class="col-md-3">
                <label for="inputVia4" class="form-label">Via</label>
                <input type="text" name="via" class="form-control" id="via" placeholder="Via" required>
            </div>
            <div class="col-md-3">
                <label for="Civico" class="form-label">Numero Civico</label>
                <input type="text" name="civico" class="form-control" id="civico" placeholder="Numero Civico" required>
            </div>
            <div class="col-md-6">
                <label for="Metratura" class="form-label">Metratura</label>
                <input type="text" name="metratura" class="form-control" id="metratura" placeholder="Metratura">
            </div>
            <div class="col-md-6">
                <label for="inputPiani" class="form-label">Piani</label>
                <input type="text" name="piano" class="form-control" id="piano" placeholder="Piani">
            </div>
            <div class="col-md-6">
                <label for="inputLocali" class="form-label">Numero Locali</label>
                <input type="text" name="nLocali" class="form-control" id="nLocali" placeholder="Numero Locali">
            </div>
            <?php
                $sql = "SELECT zona FROM tipozona";
                $result = $conn->prepare($sql);
                $result->execute();
                $rs = $result->fetchAll();
            
                $output = '
                    <div class="col-md-3">
                        <p>Zona</p>
                        ';
            
                foreach ($rs as $row) {
                    $output .= '
                        <input class="form-check-input" type="radio" name="zona" id="zona">
                        <label class="form-check-label" for="zona">'.$row['zona'].'</label><br>   
                        ';
                }
                $output .= '</div>';
                echo $output;
                
                $sql = "SELECT tipo FROM tipoimm";
                $result = $conn->prepare($sql);
                $result->execute();
                $rs = $result->fetchAll();
            
                $output = '
                    <div class="col-md-3">
                        <p>Tipo immobile</p>
                        ';
            
                foreach ($rs as $row) {
                    $output .= '
                        <input class="form-check-input" type="radio" name="tipo" id="tipo">
                        <label class="form-check-label" for="zona">'.$row['tipo'].'</label><br>   
                        ';
                }
                $output .= '</div>';
                echo $output;
                
            ?>
            <div class="col-12">
                <input type="submit" name="Invia" class="btn btn-primary" value="Invia" />
            </div>
        </form>
    </div>
</html>