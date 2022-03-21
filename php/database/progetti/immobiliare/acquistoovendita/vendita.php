<?php
include 'components/functions.php';
if (isset($_POST["Invia"])) {
    $idProp = $_REQUEST['idProp'];
    $sql = "DELETE FROM intestazioni WHERE idProp = ?";
    $result = $conn->prepare($sql);
    $result->execute([$idProp]);
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
                    echo("<option value=\"".$row['idProp']."\">".$row['idProp']."</option>");
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