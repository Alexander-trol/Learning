<?php
include 'components/functions.php';


$messaggio = '';

if (isset($_POST["Invia"])) {
    $CF = trim($_POST["CF"]);
    $nome = trim($_POST["nome"]);
    $cognome = trim($_POST["cognome"]);
    $telefono = trim($_POST['telefono']);
    $email = trim($_POST['email']);

    $controllo_sql = "SELECT * FROM proprietari 
                    WHERE CF = :CF";
    $result = $conn->prepare($controllo_sql);
    $controllo_dati = array(
        ':CF' => $CF
    );
    if ($result->execute($controllo_dati)) {
        if ($result->rowCount() > 0) {
            $messaggio .= '<div class="alert alert-danger" role="alert">Proprietario già esistente</div>';
        }
        else {
            if(empty($CF)) {
                $messaggio .= '<div class="alert alert-danger" role="alert">CF richiesto</div>';
            }
            if(empty($nome)) {
                $messaggio .= '<div class="alert alert-danger" role="alert">Nome richiesto</div>';
            }
            if(empty($cognome)) {
                $messaggio .= '<div class="alert alert-danger" role="alert">Cognome richiesto</div>';
            }
            if(empty($telefono)) {
                $messaggio .= '<div class="alert alert-danger" role="alert">Telefono richiesto</div>';
            }
            if(empty($email)) {
                $messaggio .= '<div class="alert alert-danger" role="alert">Email richiesta</div>';
            }
            if ($messaggio == '') {
                $data = array(
                    ':CF' => $CF,
                    ':nome' => $nome,
                    ':cognome' => $cognome,
                    ':telefono' => $telefono,
                    ':email' => $email
                );

                $sql = "INSERT INTO proprietari(CF, nome, cognome, telefono, email)
                VALUES ('$CF', '$nome', '$cognome', '$telefono', '$email')";
                $result = $conn->prepare($sql);
                if ($result->execute($data)) {
                    $messaggio = "<label>Aggiunta proprietario avvenuto con successo!</label>";
                    
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
                <label for="inputCF4" class="form-label">Codice Fiscale</label>
                <input type="text" name="CF" class="form-control" id="CF" placeholder="Codice Fiscale" required>
            </div>
            <div class="col-md-6">
                <label for="inputNome4" class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome" required>
            </div>
            <div class="col-12">
                <label for="inputCognome" class="form-label">Cognome</label>
                <input type="text" name="cognome" class="form-control" id="cognome" placeholder="Cognome" required>
            </div>
            <div class="col-12">
                <label for="inputTelefono" class="form-label">Telefono</label>
                <input type="text" name="telefono" class="form-control" id="telefono" placeholder="Telefono">
            </div>
            <div class="col-md-6">
                <label for="inputEmail" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Email">
            </div>
            <div class="col-12">
                <input type="submit" name="Invia" class="btn btn-primary" value="Invia" />
            </div>
        </form>
    </div>
</html>