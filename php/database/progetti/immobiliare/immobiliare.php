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
                    <div class="col-4">
                        <?php
                            $sql = "SELECT nome, cognome FROM proprietari";
                            $result = $conn->prepare($sql);
                            $result->execute();
                            $rs = $result->fetchAll();
                        
                            $output = '
                                <table class="table table-striped">
                                    <tr>
                                        <th>Nome</th>
                                        <th>Cognome</th>
                                    </tr>';
                        
                            foreach ($rs as $row) {
                                $output .= '
                                    <tr>
                                        <td>'.$row['nome'].'</td>
                                        <td>'.$row['cognome'].'</td>
                                    </tr>    
                                    ';
                                    
                            }
                            
                            $output .= '</table>';
                            echo $output;
                        ?>
                    </div>
                    <div class="col-4">
                        <?php
                            $sql = "SELECT z.zona, t.tipo 
                            FROM tipoimm AS t, tipozona AS z
                            WHERE z.id=t.id";
                            $result = $conn->prepare($sql);
                            $result->execute();
                            $rs = $result->fetchAll();
                        
                            $output = '
                                <table class="table table-striped">
                                    <tr>
                                        <th scope="col">Zona</th>
                                        <th scope="col">Tipo</th>
                                    </tr>';
                        
                            foreach ($rs as $row) {
                                $output .= '
                                    <tr>
                                        <td>'.$row['zona'].'</td>
                                        <td>'.$row['tipo'].'</td>
                                    </tr>    
                                    ';
                            }
                            $output .= '</table>';
                            echo $output;
                        ?>    
                    </div>
                    <div class="col-4">
                        <?php
                            $sql = "SELECT nome, via FROM immobili";
                            $result = $conn->prepare($sql);
                            $result->execute();
                            $rs= $result->fetchAll();

                            $output = '
                                <table class="table table-striped">
                                    <tr>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Via</th>
                                    </tr>';
                        
                            foreach ($rs as $row) {
                                $output .= '
                                    <tr>
                                        <td>'.$row['nome'].'</td>
                                        <td>'.$row['via'].'</td>
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