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
                    <div class=\"col-md-3\">
                        <label for=\"inputData\" class=\"form-label\">Data</label>
                        <input type=\"text\" name=\"data\" class=\"form-control\" id=\"data\" placeholder=\"Data\">
                    </div>
                    <div class=\"col-md-3\">
                        <label for=\"inputversamento\" class=\"form-label\">Versamento</label>
                        <input type=\"text\" name=\"versamento\" class=\"form-control\" id=\"versamento\" placeholder=\"Versamento\">
                    </div>
                    ");

            echo("<div class=\"col\">
                <div class=\"mb-3\">
                <label for=\"inCF\" class=\"form-label\">Proprietario:</label>
                <select class=\"form-select\" name=\"CF\" id=\"CF\" aria-label=\"Default select example\">");

                $sql = "SELECT * FROM proprietari";
                $result = $conn->prepare($sql);
                $result->execute();
                $rs=$result->fetchAll();
                foreach ($rs as $row) {
                    echo("<option value=\"".$row['CF']."\">".$row['CF']."</option>");
                }

                    echo("</select>
                </div>
            </div>
                <div class=\"col-12\">
                    <input type=\"submit\" name=\"Invia\" class=\"btn btn-primary\" value=\"Invia\" />
                </div>
            </form>
            ");
        ?>
    </div>
</html>