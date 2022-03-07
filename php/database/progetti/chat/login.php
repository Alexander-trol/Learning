<?php
    include('components/function.php');

    session_start();

    $message = '';

    if(isset($_SESSION['id_user'])) header('location:index.php');

    if(isset($_POST['login'])){
        $sql = "SELECT * FROM login
                WHERE username = :username";
        $result = $conn->prepare($sql);
        $result->execute(
            array(
                ':username' => $_POST["username"]
            )
        );
        
        if ($result->rowCount() > 0){
            $rs = $result->fetchAll();
            foreach ($rs as $row) {
                if(password_verify($_POST["password"], $row["password"])){
                    $_SESSION['id_user'] = $row['id_user'];
                    $_SESSION['username'] = $row['username'];
                    $sub_sql = "INSERT INTO dettagli_login(id_user) 
                                VALUES('".$row['id_user']."')";
                    $result = $conn->prepare($sub_sql);
                    $result->execute();
                    $_SESSION['id_dettagli'] = $conn->lastInsertId();
                    header('location:index.php');
                }else $message = '<label>Password errata</label>'; 
            }
        }
        else $message = '<label>Username errato</label>';
    }
?>

<!DOCTYPE html>
    <head>
        <title>CipChat</title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<!--         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 -->    <link rel="stylesheet" href="index.css">    
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js" integrity="sha256-xH4q8N0pEzrZMaRmd7gQVcTZiFei+HfRTBPJ1OGXC0k=" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <p class="danger"><?php echo $message;?></p>
            <form action="" method="POST">
            <div class="title">CipLogin</div>
                    <label for="Username">Inserisci l'Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                    <label>Inserisci la Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>

                    <input type="submit" name="login" class="button" value="Login" />

                <div style="text-align: center;">
                    <br>
                    <p>Non hai ancora un account? </p><a href="register.php">Registrati</a>
                </div>
            </form>
        </div>
    </body>
</html>