<?php
    include('components/function.php');

    session_start();

    $data = array(
        ':id_user_r'    =>  $_POST['id_user_r'],
        ':id_user_m'    =>  $_SESSION['id_user'],
        ':messaggi'     =>  $_POST['messaggi'],
        ':stato'        =>  '1'
    );

    $sql = "INSERT INTO chat_messaggi(id_user_r, id_user_m, messaggi, stato)
            VALUES (:id_user_r, :id_user_m, :messaggi, :stato)";
    $result= $conn->prepare($sql);

    if($result->execute($data)){
        echo("hi");
            echo fetch_user_cronologia_chat($_SESSION['id_user'],
            $_POST['id_user_r'], $conn);
    }
?>