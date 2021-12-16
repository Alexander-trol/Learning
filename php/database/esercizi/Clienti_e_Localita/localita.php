<?php
require("components/head.html");
require("components/function.php");
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- blocco delle scelte per Loclità -->
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Località
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="localita.php?scelta=listaLocalita">Lista Località</a></li>
                    <li><a class="dropdown-item" href="localita.php?scelta=formLocalita">Nuovo Località</a></li>
                    <!--<li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>-->
                </ul>
                </li>

                <!-- blocco delle scelte per Cliente -->
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Cliente
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="clienti.php">Lista Clienti</a></li>
                    <li><a class="dropdown-item" href="clienti.php?scelta=formCliente">Nuovo Cliente</a></li>
                    <!--<li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>-->
                </ul>
                </li>
            </ul>         
        </div>
    </div>
</nav>
<?php
if (isset($_REQUEST['scelta'])) $sc = $_REQUEST['scelta'];
else $sc = null;

switch ($sc) {
    case "listaLocalita": {
        $db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB);
        $sql = "SELECT * FROM p62e1_Localita";

        if($rs = $db->query($sql)){
            echo("<table class=\"table table-success table-striped table-hover\">
                <thead>
                    <tr>
                        <th scope=\"col\">#</th>
                        <th scope=\"col\">Cap</th>
                        <th scope=\"col\">Nome</th>
                        <th scope=\"col\">Provincia</th>
                        <!--<th scope=\"col\">Gestione</th>-->
                    </tr>
                </thead>");
            echo ("<tbody>");
            $record = $rs->fetch_assoc();
            while($record){
                echo ("<tr>
                    <th scope=\"row\">".$record['id']."</th>
                    <td>".$record['cap']."</td>
                    <td>".$record['nome']."</td>
                    <td>".$record['prov']."</td>
                    <!--<td>
                        <a href=\"index.php?scelta=deleteRecord&id_persona=" . $record['id'] . "\">Delete</a> | 
                        <a href=\"index.php?scelta=formModifica&id_persona=" . $record['id'] . "\">Modifica</a>
                    </td>-->
                </tr>");
               $record = $rs->fetch_assoc();
            }
            echo ("</tbody>");
            echo ("<caption>Tabella 'p62e1_Localita' su DB scuola2021</caption>");
            echo ("</table>");
         }
         else{
            echo("Error...");
         }
         $db->close();
         break;
      }
   case "formLocalita": {
         echo ("Form inserimento località.");
         break;
      }
   default: {
         echo ("caso di default...");
         break;
      }
}
require("components/foot.html");
?>