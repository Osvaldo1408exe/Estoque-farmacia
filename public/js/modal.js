$(document).ready(function() {
    // Lida com o evento de clique no botão "Editar" em cada linha da tabela
    $('.editar').on('click', function() {
        
        const id = $(this).data('id');
        const nome = $(this).data('nome');
        const descricao = $(this).data('descricao');
        const preco = $(this).data('preco');
        const categoria = $(this).data('categoria');
        const quantidade = $(this).data('quantidade');
        const fornecedor = $(this).data('fornecedor');


        // Preencher os campos do modal com os dados do registro clicado
        $('#edit-id').val(id);
        $('#edit-nome').val(nome);
        $('#edit-descricao').val(descricao);
        $('#edit-preco').val(preco);
        $('#edit-categoria').val(categoria);
        $('#edit-quantidade').val(quantidade);
        $('#edit-fornecedor').val(fornecedor);
        
        
        
    // Exibir o modal de edição
    $('#modalEditar').modal('show');
    });

    // Fecha o modal de edição
    $('#fechar-edicao').on('click', function(){
        $('#modalEditar').modal('hide');   
    });

});