<?php
require 'db_conf.php';
session_start();



$nome = trim($_POST['nome_prod']) ;
$descricao =trim($_POST['descricao_prod']) ;
$preco = trim($_POST['preco_prod']) ;
$quantidade = trim($_POST['quantidade_prod']) ;
$categoria = trim($_POST['categoria_prod']) ;
$fornecedor = trim($_POST['fornecedor_prod']) ;


if($_SERVER['REQUEST_METHOD'] == "POST"){

    

    if(empty($descricao)){
        $insert = "INSERT INTO produtos(nome_prod,preco_prod,id_categoria,quant_prod,id_fornecedor) VALUES ('$nome','$preco','$categoria','$quantidade','$fornecedor')";

        $resultado = pg_query($conn,$insert);
        if($resultado){
            $_SESSION['alert_message'] = "Dados enviados com sucesso!";
            header("Location: " . $_SERVER["HTTP_REFERER"]);
             exit;
        }else{
            $_SESSION['alert_message'] = "Falha ao registrar!";
            header("Location: " . $_SERVER["HTTP_REFERER"]);
            exit;
        }
    }else{

        $insert = "INSERT INTO produtos(nome_prod, descricao_prod,preco_prod,id_categoria,quant_prod,id_fornecedor) VALUES ('$nome','$descricao','$preco','$categoria','$quantidade','$fornecedor')";

        $resultado = pg_query($conn,$insert);
        if($resultado){
            $_SESSION['alert_message'] = "Dados enviados com sucesso!";
            header("Location: " . $_SERVER["HTTP_REFERER"]);
             exit;
        }else{
            $_SESSION['alert_message'] = "Falha ao registrar!";
            header("Location: " . $_SERVER["HTTP_REFERER"]);
            exit;
        }
    }
}
pg_close($conn);
?>

