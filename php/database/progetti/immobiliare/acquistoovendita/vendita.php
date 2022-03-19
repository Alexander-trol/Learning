<?php
include 'components/functions.php';

if (isset($_POST["Invia"])) {
    $dataacquisto = trim($_POST["dataacquisto"]);
    $versamento = trim($_POST["versamento"]);
    $CF = trim($_POST['CF']);
    $nome = trim($_POST['nome']);

    $data = array(
        ':dataacquisto' => $dataacquisto,
        ':versamento' => $versamento,
        ':CF' => $CF,
        ':nome' => $nome
    );

    $sql = "INSERT INTO intestazioni(dataacquisto, versamento, idProp, idImmob)
    VALUES ('$dataacquisto', '$versamento', '$CF', '$nome')";
    $result = $conn->prepare($sql);
    if ($result->execute($data)) {
        $messaggio = "<label>Aggiunta Immobile avvenuto con successo!</label>";
    }
}
?>
<html>
    <div class="container">
        <?php
            include 'navbar.php';
        ?>
        <?php
            echo ("                
                <form class=\"row g-3\" method=\"POST\">

                    <div class=\"col\">
                        <div class=\"mb-3\">
                        <label for=\"inidProp\" class=\"form-label\">Proprietario:</label>
                        <select class=\"form-select\" name=\"idProp\" id=\"idProp\" aria-label=\"Default select example\">
                ");

                $sql = "SELECT idProp FROM intestazioni";
                $result = $conn->prepare($sql);
                $result->execute();
                $rs=$result->fetchAll();
                foreach ($rs as $row) {
                    $controllo_sql = "SELECT idProp FROM intestazioni WHERE idProp = :idProp";
                    $result_control = $conn->prepare($controllo_sql);
                    $controllo_dati = array(
                        ':idProp' => $idProp
                    );
                    if ($result_control->execute($controllo_dati)) {
                        if ($result_control->rowCount() > 5) {
                            echo 'sus';
                        }
                        else{
                            echo("<option value=\"".$row['idProp']."\">".$row['idProp']."</option>");
                        }
                    }
                }

                    echo("</select>
                        </div>
                    </div>
                        <div class=\"col-12\">
                            <input type=\"hidden\" name=\"scelta\" value=\"eliminaintestazione\">
                             <input type=\"submit\" name=\"Invia\" class=\"btn btn-primary\" value=\"Invia\" />
                        </div>
                </form>
            ");
        ?>
    </div>
</html>