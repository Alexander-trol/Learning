

<!DOCTYPE html>
    <?php
    require("components/head.php");
    include 'components/function.php';

    session_start();

    if (isset($_REQUEST['sc'])) $sc = $_REQUEST['sc']; else $sc = null;
    if(!isset($_SESSION['loggato'])) $_SESSION['loggato'] = false;

    switch ($sc) {
        case 'registrazione':
            include 'registrazione.php';
            break;
        
        default:
            include 'login.php';
            break;
    }
    
    require("components/foot.php");
    ?>
</html>