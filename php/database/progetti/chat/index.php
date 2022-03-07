<?php
    include('components/function.php');

    session_start();

    if(!isset($_SESSION['id_user'])){header('location:login.php');}

?>

<!DOCTYPE html>
    <head>
        <title>CipChat</title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="index.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js" integrity="sha256-xH4q8N0pEzrZMaRmd7gQVcTZiFei+HfRTBPJ1OGXC0k=" crossorigin="anonymous"></script>
    </head>
    <body id="body">
        <div class="container">
            <br/>
            <div class="title">Cipchat</div>
            <br/>
            <div class="panel panel-default">
                <h4 class="title">Utente <?php echo $_SESSION["username"]?> online</h4>
                <div class="a"><a href="logout.php">Esci</a></div>
                <div id="user_details" class="table"></div>
                <div id="user_model_details"></div>

                <script src="index.js"></script>
            </div>
        </div>
    </body>
</html>