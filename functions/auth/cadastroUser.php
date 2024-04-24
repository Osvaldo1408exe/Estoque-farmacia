<?php
require '..\db\db_conf.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os campos de usuário e senha foram preenchidos
    if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["email"])) {
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);
        $email = trim($_POST['email']);

        // Consulta sql para verificar se o email já existe no banco
        $consultaEmail = "SELECT * FROM users WHERE email = '$email'";
        $consultaEmail = pg_query($conn, $consultaEmail);

        // Verifica se o email já existe
        if (pg_num_rows($consultaEmail) > 0) {
            echo "O email já está cadastrado no banco de dados.";
        } else {
            // Criptografando a senha
            $senhaCriptografada = password_hash($password, PASSWORD_DEFAULT);
            echo $senhaCriptografada;

            // Caso o email ainda não esteja cadastrado, continua o processo
            $cadastroSql = "INSERT INTO users(nome, email, senha) VALUES ('$username', '$email', '$senhaCriptografada')";
            $InsertUser = pg_query($conn, $cadastroSql);

            if ($InsertUser) {
                echo "Usuário cadastrado com sucesso";
                header('Location: /sistema_farmacia/pages/inicio.php');
            } else {
                echo "Erro ao cadastrar usuário";
            }
        }
        // Fecha a conexão com o banco de dados
        pg_close($conn);
    }
}
?>