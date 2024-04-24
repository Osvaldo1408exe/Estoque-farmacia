--utilizada para o cadastros dos usuarios
create table users(
	id_users serial not null
	,nome varchar(250)
	,email varchar(250) primary key
	,senha varchar(250)
)





--tabela para os fornecedores
CREATE TABLE fornecedores (
    id_fornecedor serial PRIMARY KEY,
    nome_fornecedor varchar(50) UNIQUE

);




--tabela para as categorias
CREATE TABLE categorias (
    id_categoria serial PRIMARY KEY,
    nome_categoria varchar(50) UNIQUE
);



--tabela utilizada no cadastro e consulta dos produtos
create table produtos(
	id_prod serial not null
	,nome_prod varchar(50) primary key
	,descricao_prod varchar(250)
	,preco_prod float
	,id_categoria int references categorias(id_categoria)
	,quant_prod int
	,id_fornecedor int references fornecedores(id_fornecedor)
	,data_cadastro date
)





--lista categorias

/*
id          nome_categoria 

1. 		Medicamentos sem prescrição médica
2. 		Medicamentos com prescrição médica 
3.		Produtos de higiene pessoal 
4. 		Produtos de cuidados com a pele 
5. 		Vitaminas e suplementos alimentares 
6. 		Produtos para cuidados bucais 
7. 		Produtos para cuidados com os olhos 
8. 		Produtos para cuidados com os cabelos
9. 		Produtos para cuidados com os pés 
10. 	Produtos de primeiros socorros

*/

