<?php 
session_start();
if ($_SESSION['logged_in'] == true) {
    // Destrói a sessão
    session_destroy();


    $_SESSION['logged_in'] = false;
    header("Location: {$_SERVER['HTTP_REFERER']}");

    
    exit;
}

?>