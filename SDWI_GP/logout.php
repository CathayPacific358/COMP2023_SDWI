<?php
    session_start();
    $url = $_SERVER["HTTP_REFERER"];
    if(isset($_SESSION['user'])){
        $_SESSION = array();
        session_destroy();
    }
    header('Location:'.$url);
?>