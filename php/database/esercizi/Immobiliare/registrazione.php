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
                    <input type="username" class="form-control" id="username" placeholder="username" required>
                    <label for="username">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" placeholder="name@example.com" required>
                    <label for="email">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="cpassword" class="form-control" id="cpassword" placeholder="cPassword" required>
                    <label for="cpassword">Conferma password</label>
                </div>
                <div class="form-floating mb-3">
                    <button name="submit" class="btn">Registrati</button>
                </div>
                <p class="paragrafo">Hai già un account? <a href="index.php">Registrati</a></p>
            </form>
        </div>
    </body>
</html>

<?php



?>