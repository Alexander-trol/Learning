<?php



?>

<!DOCTYPE html>

    <head>
        <title>Login</title>
        <link rel="stylesheet" href="index.css">
    </head>
    <body>
        <br>
        <div class="container">
            <form action="" method="POST">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" placeholder="name@example.com" required>
                    <label for="email">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>
                <div class="form-floating mb-3">
                    <button name="submit" class="btn">Login</button>
                </div>
                <p class="paragrafo">Non hai un account? <a href="index.php?sc=registrazione">Registrati</a></p>
            </form>
        </div>
    </body>

</html>