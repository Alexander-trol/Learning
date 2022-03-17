
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
                
                $sql = "UPDATE proprietari SET nome=?, cognome=?, telefono=?, email=? WHERE CF=?";
                $result = $conn->prepare($sql);
                $result->execute([$nome, $cognome, $telefono, $email, $CF]);
                header('location: index.php/?scelta=operazioniproprietari');
                break;
            case 'modificaimmobile':
                include 'modifica/modificaimmobile.php';
                break;
            case 'updateimmobile':
                $id = $_REQUEST['id'];
                $nome = $_REQUEST['nome'];
                $via = $_REQUEST['via'];
                $civico = $_REQUEST['civico'];
                $metratura = $_REQUEST['metratura'];
                $piano = $_REQUEST['piano'];
                $nLocali = $_REQUEST['nLocali'];
                
                $sql = "UPDATE immobili SET nome=?, via=?, civico=?, metratura=?, piano=?, nLocali=? WHERE id=?";
                $result = $conn->prepare($sql);
                $result->execute([$nome, $via, $civico, $metratura, $piano, $nLocali, $id]);
                header('location: index.php/?scelta=operazioniimmobili');
                break;
            case 'modificazona':
                include 'modifica/modificazona.php';
                break;
            case 'updatezona':
                $id = $_REQUEST['id'];
                $zona = $_REQUEST['zona'];
                
                $sql = "UPDATE tipozona SET zona=? WHERE id=?";
                $result = $conn->prepare($sql);
                $result->execute([$zona, $id]);
                header('location: index.php/?scelta=operazionizoneetipoogie');
                break;
            case 'modificatipologia':
                include 'modifica/modificatipologia.php';
                break;
            case 'updatetipologia':
                $id = $_REQUEST['id'];
                $tipo = $_REQUEST['tipo'];
                
                $sql = "UPDATE tipoimm SET tipo=? WHERE id=?";
                $result = $conn->prepare($sql);
                $result->execute([$tipo, $id]);
                header('location: index.php/?scelta=operazionizoneetipoogie');
                break;
            case 'eliminaproprietario':
                $CF = $_REQUEST['CF'];
                $sql = "DELETE FROM proprietari WHERE CF=?";
                $result = $conn->prepare($sql);
                $result->execute([$CF]);
                header('location: index.php/?scelta=operazioniproprietari');
                break;
            case 'eliminaimmobile':
                $id = $_REQUEST['id'];
                $sql = "DELETE FROM immobili WHERE id=?";
                $result = $conn->prepare($sql);
                $result->execute([$id]);
                header('location: index.php/?scelta=operazioniimmobili');
                break;
            case 'eliminazona':
                $id = $_REQUEST['id'];
                $sql = "DELETE FROM tipozona WHERE id=?";
                $result = $conn->prepare($sql);
                $result->execute([$id]);
                header('location: index.php/?scelta=operazionizoneetipoogie');
                break;
            case 'eliminatipologia':
                $id = $_REQUEST['id'];
                $sql = "DELETE FROM tipoimm WHERE id=?";
                $result = $conn->prepare($sql);
                $result->execute([$id]);
                header('location: index.php/?scelta=operazionizoneetipoogie');
                break;
            case 'acquisto_vendita':
                include 'acquisto_vendita.php';
                break;
            case 'acquisto':
                include 'acquistoovendita/acquisto.php';
                break;
            case 'visualizzapdf':
                include 'fpdf/pdf.php';
                break;
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>