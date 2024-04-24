<?php
require '..\functions\auth\verifica_login.php';

if (isset($_SESSION['alert_message'])) {
    echo "<script>alert('" . $_SESSION['alert_message'] . "');</script>";
    unset($_SESSION['alert_message']); // Limpar a mensagem da sessão
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="..\public\img\logo.png">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	
    <title>Farmacia</title>
</head>
<body>

	<?php include 'estrutura/navbar.php';?>

    <div class="container mt-5">
		<div class="row">
			<form   method="post" action="..\functions\db\db_insertProdutos.php">
				<div class="row">
					<p class="h1 text-center">Cadastrar </p>
					<div class="col-md-4">
						<label class="form-label">Produto</label>
                        <input class="form-control" type="text" name="nome_prod" required>

						
					</div>
				          
					<div class="col-md-4">
                        <label class="form-label">Quantidade em estoque</label>
						<input class="form-control" type="number" name="quantidade_prod" required>
					</div>




					<div class="col-md-4">	
                        <label class="form-label">preço</label>
						<input class="form-control" type="text" name="preco_prod" required>
					</div>	


					<div class="col-md-4">
						<label class="form-label">Categoria</label>
						<select id="categoria" class="form-select" type="text" name="categoria_prod" required="required">
							<option></option>
							<option value="1">Medicamentos sem prescrição médica</option>
							<option value="2">Medicamentos com prescrição médica</option>
							<option value="3">Produtos de higiene pessoal </option>
							<option value="4">Produtos de cuidados com a pele</option>
							<option value="5">Vitaminas e suplementos alimentares</option>
							<option value="6">Produtos para cuidados bucais </option>
							<option value="7">Produtos para cuidados com os olhos</option>
							<option value="8">Produtos para cuidados com os cabelos</option>
							<option value="9">Produtos para cuidados com os pés</option>
                            <option value="10">Produtos de primeiros socorros</option>
						</select>
					</div>

					<div class="col-md-4">
						<label class="form-label">Fornecedor</label>
						<select id="fornecedor" name="fornecedor_prod" class="form-select"  required="required">
							<option></option>
							<option value="1">Fornecedor 1</option>
							<option value="2">Fornecedor 2</option>
							<option value="3">Fornecedor 3</option>
							<option value="4">Fornecedor 4</option>
							<option value="5">Fornecedor 5</option>
							<option value="6">Fornecedor 6</option>
							<option value="7">Fornecedor 7</option>
							<option value="8">Fornecedor 8</option>
						</select>
 
					</div>
                        
                    <div class="col-md-6 mx-auto">
                        <div class="">
                            <label class="form-label " for="comment">Descrição</label>
                        <textarea name="descricao_prod" class="form-control" rows="5" id="descricao"></textarea>
                        </div>
                    </div>

                    
                </div>
                <div class="col text-center">
                    <button type="submit" class="btn btn-primary btn-lg mt-3">Adicionar
                </div>
			</form>
		</div>
    </div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

<script src="../public/js/mascara.js"></script>
</body>
</html>