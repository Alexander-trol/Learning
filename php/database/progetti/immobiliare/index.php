
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
        include 'components/functions.php';
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
            case 'listaimmobili':
                include 'lista/listaimmobili.php';
                break;
            case 'listazoneetipologie':
                include 'lista/listazoneetipologie.php';
                break;
            case 'operazioniproprietari':
                include 'operazioni/operazioniproprietari.php';
                break;
            case 'operazionizoneetipoogie':
                include 'operazioni/operazionizoneetipologie.php';
                break;
            case 'operazioniimmobili':
                include 'operazioni/operazioniimmobili.php';
                break;
            case 'aggiungiproprietario':
                include 'aggiunta/aggiungiproprietario.php';
                break;
            case 'aggiungiimmobile':
                include 'aggiunta/aggiungiimmobile.php';
                break;
            case 'aggiungizoneetipologia':
                include 'aggiunta/aggiungizoneetipologia.php';
                break;
            case 'modificaproprietario':
                include 'modifica/modificaproprietario.php';
                break;
            case 'updateproprietario':
                $CF = $_REQUEST['CF'];
                $nome = $_REQUEST['nome'];
                $cognome = $_REQUEST['cognome'];
                $telefono = $_REQUEST['telefono'];
                $email = $_REQUEST['email'];
                
                $sql = "UPDATE proprietari 
                    SET CF=?, nome=?, cognome=?, telefono=?, email=?";
                $result = $conn->prepare($sql);
                $result->execute([$CF, $nome, $cognome, $telefono, $email]);
                break;
            case 'modificaimmobile':
                # code...
                break;
            case 'modificazona':
                # code...
                break;
            case 'modificatipologia':
                # code...
                break;
            case 'eliminaproprietario':
                $CF = $_REQUEST['CF'];
                $sql = "DELETE FROM proprietari WHERE CF=?";
                $result = $conn->prepare($sql);
                $result->execute([$CF]);
                break;
            case 'eliminaimmobile':
                $id = $_REQUEST['id'];
                $sql = "DELETE FROM immobili WHERE id=?";
                $result = $conn->prepare($sql);
                $result->execute([$id]);
                break;
            case 'eliminazona':
                $id = $_REQUEST['id'];
                $sql = "DELETE FROM tipozona WHERE id=?";
                $result = $conn->prepare($sql);
                $result->execute([$id]);
                break;
            case 'eliminatipologia':
                $id = $_REQUEST['id'];
                $sql = "DELETE FROM tipoimm WHERE id=?";
                $result = $conn->prepare($sql);
                $result->execute([$id]);
                break;
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>