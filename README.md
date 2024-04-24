# Estoque-farmacia
Sistema feito utilizando PHP,Postgres e Bootstrap. As funcionalidades atuais são:

> Criação e alteração de Produtos;
> Sistema de login;
> Sessões PHP;
> Criptografia de senhas;
> Valores dos inputs Fornecedores e Categoria são coletados direto do banco;

Para testar o sistema:

* Passo 1: Crie as tabelas com o SQL localizado no diretório /sql/tabelas.sql (instruções detalhados no arquivo txt dentro do diretorio);
* Passo 2: Faça a carga do arquivo categorias.csv para a tabela categorias, o mesmo com a tabela fornecedores;
* Passo 3: Edite o arquivo 'function/db/db_conf.php' de acordo com as configurações de seu servidor local;
