<?php

include('components/function.php');
session_start();

$messaggio = '';

if (isset($_SESSION['id'])) {
    header('location:index.php');
}

if (isset($_POST["registrati"])) {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $controllo_sql = "SELECT * FROM login
                    WHERE username = :username";
    $result = $conn->prepare($controllo_sql);
    $controllo_dati = array(
        ':username' => $username
    );
    if ($result->execute($controllo_dati)) {
        if ($result->rowCount() > 0) {
            $messaggio .= '<p><label>Username già esistente</label></p>';
        }
        else {
            if(empty($username)) {
                $messaggio .= '<p><label>Username richiesto</label></p>';
            }
            if(empty($password)) {
                $messaggio .= '<p><label>Password richiesta</label></p>';
            }
            else {
                if ($password != $_POST['confirm_password']) {
                    $messaggio .= '<p><label>La password non è la stessa</label></p>';
                }
            }
            if ($messaggio == '') {
                $data = array(
                    ':username' => $username,
                    ':password' => password_hash($password, PASSWORD_DEFAULT)
                );

                $sql = "INSERT INTO login (username, password)
                        VALUES(:username, :password)";
                $result=$conn->prepare($sql);
                if ($result->execute($data)) {
                    $messaggio = "<label>Registrazione avvenuta con successo!</label>";
                    header('location:login.php');
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
    <head>
        <title>immobiliare</title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="index.css"> 
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js" integrity="sha256-xH4q8N0pEzrZMaRmd7gQVcTZiFei+HfRTBPJ1OGXC0k=" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <span class="danger"><?php echo $messaggio; ?></span>
            <form action="" method="POST">
                <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="Username"/>
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password"/>
                <label>Password di conferma</label>
                <input type="password" name="confirm_password" class="form-control" placeholder="Password"/>
                <input type="submit" name="registrati" class="button" value="Registrati" />
                <div style="text-align: center;">
                    <br>
                    <p>Hai già un account? </p><a href="login.php">Login</a>
                </div>
            </form>
        </div>
    </body>
</html>