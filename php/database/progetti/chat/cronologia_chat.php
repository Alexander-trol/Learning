<?php
    include('components/function.php');
    session_start();

    echo fetch_user_cronologia_chat($_SESSION["id_user"], $_POST["id_user_r"], $conn);
    
?>