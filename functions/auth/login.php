<?php
require '..\db\db_conf.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os campos de usuário e senha foram preenchidos
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        // Consulta SQL para obter o usuário pelo nome
        $consultaUsuario = "SELECT nome, senha FROM users WHERE nome = '$username'";
        $consultaUsuario = pg_query($conn, $consultaUsuario);
        
        // Verifica se o usuário foi encontrado
        if (pg_num_rows($consultaUsuario) == 1) {
            $row = pg_fetch_assoc($consultaUsuario);
            $senhaCriptografada = $row['senha'];
            
            // Verifica se a senha digitada corresponde à senha criptografada no banco de dados
            if (password_verify($password, $senhaCriptografada)) {
                $_SESSION['username'] = $username;
                $_SESSION['logged_in'] = true;
                header('Location: /sistema_farmacia/pages/inicio.php');
            } else {
                //Senha incorreta
                header("Location: " . $_SERVER["HTTP_REFERER"]);

                
            }
        } else {
            echo "Usuário não encontrado";
        }
    }
}
require 'verifica_login.php';
?>