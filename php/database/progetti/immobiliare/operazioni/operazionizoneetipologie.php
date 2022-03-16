<?php
include 'components/functions.php';
?>

<html>
    <head>
    </head>
    <body>
        <div class="container ">
            <nav class="navbar navbar-expand-lg navbar-light bg-light p-3">
            <a href="index.php?scelta=immobiliare" class="navbar-brand">Immobiliare</a>

                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Gestione Proprietari
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="index.php?scelta=listaproprietari">Lista proprietari</a></li>
                                <li><a class="dropdown-item" href="index.php?scelta=operazioniproprietari">Operazioni proprietari</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Gestione Zone Cittadine
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="index.php?scelta=listazoneetipologie">Lista Zone e Tipologie</a></li>
                                <li><a class="dropdown-item" href="index.php?scelta=operazionizoneetipoogie">Operazioni Zone e Tipologie</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Gestione Immobili
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="index.php?scelta=listaimmobili">Lista Immobili</a></li>
                                <li><a class="dropdown-item" href="index.php?scelta=operazioniimmobili">Operazioni Immobili</a></li>
                            </ul>
                        </li>
                    </ul>
                    <a href="index.php?scelta=logout" class="navbar-brand">Logout</a>
                </div>
            </nav>
            <div class="container" style="padding-top: 20px;">
                <div class="row">
                    <div class="col-6">
                        <?php
                            $sql = "SELECT * FROM tipozona";
                            $result = $conn->prepare($sql);
                            $result->execute();
                            $rs = $result->fetchAll();
                        
                            $output = '
                                <table class="table table-striped">
                                    <tr>
                                        <th>#</th>
                                        <th>Zona</th>
                                        <th>Operazioni</th>
                                        <th><a href="./?scelta=aggiungizoneetipologia">Aggiungi</a></th>
                                    </tr>';
                        
                            foreach ($rs as $row) {
                                $output .= '
                                    <tr>
                                        <td>'.$row['id'].'</td>
                                        <td>'.$row['zona'].'</td>
                                        <td>
                                            <a href="index.php/?scelta=eliminazona&id='.$row['id'].'">Elimina</a> &#47;
                                            <a href="index.php/?scelta=eliminazona&id='.$row['id'].'">Modifica</a>
                                        </td>
                                        <td></td>
                                    </tr>    
                                    ';
                            }
                            $output .= '</table>';
                            echo $output;
                        ?>
                    </div>
                    <div class="col-6">
                        <?php
                            $sql = "SELECT * FROM tipoimm";
                            $result = $conn->prepare($sql);
                            $result->execute();
                            $rs = $result->fetchAll();
                        
                            $output = '
                                <table class="table table-striped">
                                    <tr>
                                        <th>#</th>
                                        <th>Tipologia</th>
                                        <th>Operazioni</th>
                                        <th><a href="./?scelta=aggiungizoneetipologia">Aggiungi</a></th>
                                    </tr>';
                        
                            foreach ($rs as $row) {
                                $output .= '
                                    <tr>
                                        <td>'.$row['id'].'</td>
                                        <td>'.$row['tipo'].'</td>
                                        <td>
                                            <a href="index.php/?scelta=eliminatipologia&id='.$row['id'].'">Elimina</a> &#47;
                                            <a href="">Modifica</a>
                                        </td>
                                        <td></td>
                                    </tr>    
                                    ';
                            }
                            $output .= '</table>';
                            echo $output;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>