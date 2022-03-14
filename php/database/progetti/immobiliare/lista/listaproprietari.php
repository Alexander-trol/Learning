<?php
include 'components/functions.php';
?>
<html>
    <head>
    </head>
    <body>
        <div class="container ">
            <nav class="navbar navbar-expand-lg navbar-light bg-light p-3">
            <a href="" class="navbar-brand">Immobiliare</a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Gestione Proprietari
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="index.php?scelta=listaproprietari">Lista proprietari</a></li>
                                <li><a class="dropdown-item" href="index.php?scelta=modificaproprietari">Modifica proprietari</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Gestione Zone Cittadine
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="index.php?scelta=listazoneetipologie">Lista Zone e Tipologie</a></li>
                                <li><a class="dropdown-item" href="index.php?scelta=modificazoneetipoogie">Modifica Zone e Tipologie</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Gestione Immobili
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="index.php?scelta=listaimmobili">Lista Immobili</a></li>
                                <li><a class="dropdown-item" href="index.php?scelta=modificaimmobili">Modifica Immobili</a></li>
                            </ul>
                        </li>
                    </ul>
                    <a href="index.php?scelta=logout" class="navbar-brand">Logout</a>
                </div>
            </nav>
            <div>
                <?php
                    $sql = "SELECT * FROM proprietari";
                    $result = $conn->prepare($sql);
                    $result->execute();
                    $rs = $result->fetchAll();
                
                    $output = '
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
                                <td>'.$row['CF'].'</td>
                                <td>'.$row['nome'].'</td>
                                <td>'.$row['cognome'].'</td>
                                <td>'.$row['telefono'].'</td>
                                <td>'.$row['email'].'</td>
                            </tr>    
                            ';
                    }
                    $output .= '</table>';
                    echo $output;
                ?>
            </div>
        </div>
    </body>
</html>