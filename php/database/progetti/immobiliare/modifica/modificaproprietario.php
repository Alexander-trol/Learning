<?php
include 'components/functions.php';
?>

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
            <?php
                $CF= $_REQUEST['CF'];

                $sql = "SELECT * FROM proprietari WHERE CF=$CF";
                $result = $conn->prepare($sql);
                $result->execute();
                $rs = $result->fetchAll();

                $output='
                <form class="row g-3" method="POST">
                    <div class="col-md-6">
                        <label for="inputCF4" class="form-label">Codice Fiscale</label>
                        <input type="text" name="CF" class="form-control" id="CF" value="\'.$rs[\'CF\'].\'" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputNome4" class="form-label">Nome</label>
                        <input type="text" name="nome" class="form-control" id="nome" value="\'.$rs[\'nome\'].\'" required>
                    </div>
                    <div class="col-12">
                        <label for="inputCognome" class="form-label">Cognome</label>
                        <input type="text" name="cognome" class="form-control" id="cognome" value="\'.$rs[\'cognome\'].\'" required>
                    </div>
                    <div class="col-12">
                        <label for="inputTelefono" class="form-label">Telefono</label>
                        <input type="text" name="telefono" class="form-control" id="telefono" value="\'.$rs[\'telefono\'].\'">
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" value="\'.$rs[\'email\'].\'">
                    </div>
                    <input type="hidden" name="scelta" value="updateproprietario">
                    <input type="hidden" name="CF" value="'.$CF.'">
                    <div class="col-12">
                        <input type="submit" name="Aggiorna" class="btn btn-primary" value="Aggiorna" />
                    </div>
                </form>
                ';
                echo $output;
            ?>
        </div>
    </body>
</html>