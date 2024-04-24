<?php
session_start();

// Verifica se o usuário não está logado
if ($_SESSION['logged_in'] == false) {
    header("Location: ../index.html"); // Redireciona para a página de login
    exit;
}
?>