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
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                    header('location:index.php');
                }else $message = '<label>Password errata</label>'; 
            }
        }
        else $message = '<label>Username errato</label>';
    }
?>

<!DOCTYPE html>
    <head>
<!--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->
        <link rel="stylesheet" href="index.css">
    <body>
        <div class="container">
            <p class="danger"><?php echo $message;?></p>
            <form action="" method="POST">
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