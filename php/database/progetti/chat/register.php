<?php

include('components/function.php');
session_start();

$messaggio = '';

if (isset($_SESSION['id_user'])) {
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
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
    <head>
        <title>CipChat</title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js" integrity="sha256-xH4q8N0pEzrZMaRmd7gQVcTZiFei+HfRTBPJ1OGXC0k=" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <br/>
            <h3 style="text-align: center;">CipChat</a></h3>
            <br/>
            <div class="panel panel-default">
                <div class="panel-heading">CipRegister</div>
                <span class="text-danger"><?php echo $messaggio; ?></span>
                <div class="panel-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Password di conferma</label>
                            <input type="password" name="confirm_password" class="form-control" />
                        </div>
                        <div class="form-group">
                            <input type="submit" name="registrati" class="btn btn-info" value="Registrati" />
                        </div>
                        <div style="text-align: center;">
                            <a href="login.php">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>