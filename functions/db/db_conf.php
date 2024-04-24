<?php
$host = "localhost"; // Host do banco de dados
$port = '5432'; //porta
$dbname = 'db_farmacia'; //nome do banco de dados
$user = 'postgres'; //usuario
$password = "321"; // Senha

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    echo "Erro de conexão.";
    echo pg_last_error($conn);
    exit;
}
?>
