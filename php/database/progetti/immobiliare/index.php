<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Immobiliare</title>
</head>
<body>
    <?php
        session_start();
        $scelta = isset($_REQUEST['scelta']) ? $_REQUEST['scelta'] : null;

        switch($scelta){
            default:
                echo (
                    "<div class=\"container\">
                        <form action=\"\">
                            <div class=\"form-group\">
                                <label for=\"\">Username</label>
                                <input type=\"text\" name=\"username\" class=\"form-control\" placeholder=\"Inserisci username\" required>
                            </div>
                            <div class=\"form-group\">
                                <label for=\"\">Password</label>
                                <input type=\"password\" name=\"password\" class=\"form-control\" placeholder=\"Inserisci password\" required>
                                <small class=\"form-text text-muted\"></small>
                            </div>
                            <input type=\"hidden\" name=\"scelta\" value=\"login\">
                            <button class=\"btn btn-primary\">Entra</button>
                        </form>
                    </div>"
                );
                break;
            case 'login':
                include 'authentication/login.php';
                break;
            case 'immobiliare': 
                include 'immobiliare.php';
                break;
            case 'logout':
                include 'logout.php';
                break;
            case 'listaproprietari':
                include 'lista/listaproprietari.php';
                break;
            case 'modificaproprietari':
                include 'modificaproprietari.php';
                break;
            case 'listazoneetipologie':
                include 'lista/listazoneetipologie.php';
                break;
            case 'modificazoneetipoogie':
                include 'modificazoneetipoogie.php';
                break;
            case 'listaimmobili':
                include 'lista/listaimmobili.php';
                break;
            case 'modificaimmobili':
                include 'modificaimmobili.php';
                break;
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>