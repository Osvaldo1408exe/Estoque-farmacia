
<?php   
require '..\functions\auth\verifica_login.php';
include '..\functions\campos\campos.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link href="https://cdn.datatables.net/v/dt/dt-1.13.8/datatables.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
  
        <link rel="icon" href="../public/img/logo.png">
        <title>Produtos</title>
    </head>

    <body >

        
        <!-- barra de navegação -->
        <?php include 'estrutura/navbar.php';?>
		
		
		

        <div class="container-fluid py-3">
        
        <!--TABELA-->
            <div class="table-container">
                <table id="tabela" class="table table-bordered table-hover">
                    <thead class="thead-dark thead-fixed">
                        <tr>
                            <th class=""></th>
                            <th class="col text-center">Produto</th>
                            <th class="col text-center">preço</th>
                            <th class="col text-center">Categoria</th>
                            <th class="col text-center">Quantidade em Estoque</th>
                            <th class="col text-center">Fornecedor</th>
                            <th class="col text-center">Descrição</th>

                            

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require '..\functions\db\db_conf.php';                
                            // Consulta SQL para recuperar registros da tabela
                            $query = "SELECT produtos.*, categorias.nome_categoria, fornecedores.nome_fornecedor
                            FROM produtos
                            INNER JOIN categorias ON produtos.id_categoria = categorias.id_categoria
                            INNER JOIN fornecedores ON produtos.id_fornecedor = fornecedores.id_fornecedor
                            ORDER BY produtos.nome_prod;";
                            $result = pg_query($conn, $query);
                            
                            while ($row = pg_fetch_assoc($result)) {
                                echo "<tr>";
                                // Botão de edição
                                echo "<td class='text-center'><button class='editar btn btn-primary' data-id='" . $row['id_prod'] . "' data-nome='" . $row['nome_prod'] . "' data-descricao='" . $row['descricao_prod'] . "' data-preco='" . $row['preco_prod'] . "' data-categoria='" . $row['id_categoria'] . "' data-quantidade='" . $row['quant_prod'] . "' data-fornecedor='" . $row['id_fornecedor'] . "'>Editar</button></td>";
                                
                                // dados do produto
                                echo "<td class='text-center'>" . $row['nome_prod'] . "</td>";
                                echo "<td class='text-center'>" . "R$" . $row['preco_prod'] . "</td>";
                                echo "<td class='text-center'>" . $row['nome_categoria'] . "</td>";
                                echo "<td class='text-center'>" . $row['quant_prod'] . "</td>";
                                echo "<td class='text-center'>" . $row['nome_fornecedor'] . "</td>";
                                echo "<td class='text-center'>" . $row['descricao_prod'] . "</td>";

                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal de Edição -->
        <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title text-center">Editar</h5>
                </div>
                    <div class="modal-body">
                        <!-- Formulário de edição -->
                        <form id="formEdicao" action="..\functions\db\db_updateProdutos.php" method="post">
                            
                            <!--id de cada registro-->
                            <input type="hidden" id="edit-id" name="id">

                            <div class="form-group">
                                <label for="nome">Nome Produto</label>
                                <input type="text" class="form-control" id="edit-nome" name="nome" required>
                            </div>

                            
                            <div class="form-group">
                                <label for="descricao">Descrição</label>
                                <input type="text" class="form-control" id="edit-descricao" name="descricao">
                            </div>

                            <div class="form-group">
                                <label for="preco">Preço</label>
                                <input type="text" class="form-control" id="edit-preco" name="preco" required>
                            </div>

                            <div class="form-group">
                                <label for="categoria">Categoria</label>
                                <?php
                                    // Gera as opções do select
                                    echo '<select id="edit-categoria" name="categoria_prod" class="form-select" required="required">';
                                    while ($categoria = pg_fetch_assoc($campocategoria)) {
                                        echo '<option value="' . $categoria['id_categoria'] . '">' . $categoria['nome_categoria'] . '</option>';
                                    }
                                    echo '</select>';
                                ?>
                            </div>

                            <div class="form-group">
                                <label for="quantidade">Quantidade</label>
                                <input type="number" class="form-control" id="edit-quantidade" name="quantidade" required>
                            </div>

                            <div class="form-group">
                                <label for="fornecedor">Fornecedor</label>
                                <?php
                                    // Gera as opções do select
                                    echo '<select id="edit-fornecedor" name="fornecedor_prod" class="form-select" required="required">';
                                    while ($fornecedor = pg_fetch_assoc($campofornecedor)) {
                                        echo '<option value="' . $fornecedor['id_fornecedor'] . '">' . $fornecedor['nome_fornecedor'] . '</option>';
                                    }
                                    echo '</select>';
                                ?>
                            </div>


                            <div class="modal-footer">
                                <button class="btn btn-primary" type="button"  id="fechar-edicao" data-dismiss="modal">Fechar</button>
                                <button class="btn btn-primary" type="submit"  id="salvar-edicao">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery, Bootstrap JS e algumas extensões do DataTables-->  
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>



        <!-- Scripts locais-->
        <script src="../public/js/datatables.js"></script>
        <script src="../public/js/modal.js"></script>



    </body>
</html>



