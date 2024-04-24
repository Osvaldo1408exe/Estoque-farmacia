<?php
require '..\functions\db\db_conf.php';

// Consulta SQL para obter os valores do campo categoria
$consulta_categoria = "SELECT DISTINCT nome_categoria,id_categoria FROM categorias order by nome_categoria";
$campocategoria = pg_query($conn, $consulta_categoria);

// Verifica se a consulta foi bem-sucedida
if (!$campocategoria) {
    die("Erro na consulta ao banco de dados.");
}

// Consulta SQL para obter os valores do campo fornecedor
$consulta_fornecedor = "SELECT DISTINCT nome_fornecedor,id_fornecedor FROM fornecedores order by nome_fornecedor";
$campofornecedor = pg_query($conn, $consulta_fornecedor);

// Verifica se a consulta foi bem-sucedida
if (!$campofornecedor) {
    die("Erro na consulta ao banco de dados.");
}

// Fecha a conexão com o banco de dados
pg_close($conn);

?>
 