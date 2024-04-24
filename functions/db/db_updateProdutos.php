<?php
require 'db_conf.php';


$id_produto = $_POST['id'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];
$quantidade = $_POST['quantidade'];
$categoria = $_POST['categoria_prod'];
$fornecedor = $_POST['fornecedor_prod'];


if($_SERVER['REQUEST_METHOD'] == "POST"){

    

    if(empty($descricao)){
        $update = "UPDATE produtos SET nome_prod= '$nome',descricao_prod=NULL,preco_prod= '$preco',id_categoria= '$categoria',quant_prod= '$quantidade',id_fornecedor= '$fornecedor' WHERE id_prod='$id_produto'";

        $resultado = pg_query($conn,$update);
        if($resultado){
            header('Location: /sistema_farmacia/pages/itens.php');
            exit;
        }else{
            echo "<h1>Falha ao registrar o </h1>";
            exit;
        }
    }else{


        $update = "UPDATE produtos SET nome_prod= '$nome',descricao_prod= '$descricao',preco_prod= '$preco',id_categoria= '$categoria',quant_prod= '$quantidade',id_fornecedor= '$fornecedor' WHERE id_prod='$id_produto'";

        

        $resultado = pg_query($conn,$update);
        if($resultado){
            header('Location: /sistema_farmacia/pages/itens.php');
            exit;
        }else{
            echo "<h1>Falha ao registrar o </h1>";
            exit;
        }
    }
}
pg_close($conn);
?>