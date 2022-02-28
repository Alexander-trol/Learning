<?php
session_start();
?>
<html>
	<head>
		<!-- Inserimento link al CSS per BootStrap versione 5.1 -->
        <title>Chat bella
		<?php
			/* echo($_SESSION['Id']); */
		?>
		</title>
		
		<link rel="stylesheet" href="index.css">
		<script src="script.js"></script>
	</head>
	<body>
		<?php
			require("funzioni.php");

			if(isset($_REQUEST['scelta'])) $sc = $_REQUEST['scelta']; else $sc = null;

			switch($sc){
				/* AUTENTICAZIONE */
				case 'formRegister': {
					include 'formRegister.php';
					break;
				}
				case 'register': {
					//registrazione
					include 'register.php';
					break;
				}
				default: {
					include 'formLogin.php';
					break;
				}
				case 'formLogin': {
					include 'formLogin.php';
					break;
				}
				case 'login': {
					include 'login.php';
					break;
				}

				/* CHAT */
				case 'chat': {
					/* check cookie */
					include 'checkCookie.php';

					include 'chat.php';
					break;
				}
				case 'sendMsg': {
					/* check cookie */
					include 'checkCookie.php';
					
					include 'sendMsg.php';
					break;
				}
			}
		?>
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script>
			/* let css = document.createElement("style");
            css.src = style.css + "?_dc=" + Date.now();
            document.body.appendChild(css); */
		</script>
	</body>
</html>