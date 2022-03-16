<?php
include 'components/functions.php';
?>

<html>
    <div class="container">
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
            $id = $_REQUEST['id'];

            $sql = "SELECT * FROM tipozona WHERE id=$id";
            $result = $conn->prepare($sql);
            $result->execute();
            $rs = $result->fetchAll();

            $output='
                <form class="row g-3" method="POST">
                    <div class="col-md-6">
                        <label for="inputZona4" class="form-label">Zona</label>
                        <input type="text" name="zona" class="form-control" id="zona" value="\'.$rs[\'id\'].\'">
                    </div>
                    <input type="hidden" name="scelta" value="updatezona">
                    <input type="hidden" name="id" value="'.$id.'">
                    <div class="col-7">
                        <input type="submit" name="Aggiorna" class="btn btn-primary" value="Aggiorna" />
                    </div>
                </form>
            ';
            echo $output;
        ?>
    </div>
</html>