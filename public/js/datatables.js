$(document).ready(function () {
    document.title = "Produtos";

    var table = $("#tabela").DataTable({
        dom: '<"dt-buttons"Bf><"clear">lirtp',
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/pt-BR.json',
        },
        ordering: false,
        pageLength: 25,
        paging: true,
        processing: true,
        autoWidth: false,
        
        initComplete: function (settings, json) {
            // Preenche os dropdowns com os valores únicos da coluna
            $("#tabela thead th").each(function (index) {
                var title = $(this).text();
                if (index !== 0) {
                    var columnData = table.column(index).data().unique().sort().toArray();
                    var dropdownOptions = '<option value="">' + title + '</option>';

                    for (var i = 0; i < columnData.length; i++) {
                        dropdownOptions += '<option value="' + columnData[i] + '">' + columnData[i] + '</option>';
                    }

                    $(this).html('<select class="filter-dropdown" style="width: 100%">' + dropdownOptions + '</select>');
                }
            });

            // Inicializa os dropdowns com a biblioteca select2
            $(".filter-dropdown").select2();

        }
    });

    // Aplica os filtros quando os dropdowns são alterados
    $(document).on("change", ".filter-dropdown", function () {
        var columnIndex = $(this).parent().index();
        var filterValue = $(this).val();

        table.column(columnIndex).search(filterValue).draw();
    });

    // Adiciona a funcionalidade de filtrar ao botão "Filtrar"
    $(document).on("click", "#filterButton", function () {
        $(".filter-dropdown").each(function () {
            var columnIndex = $(this).parent().index();
            var filterValue = $(this).val();

            table.column(columnIndex).search(filterValue);
        });

        table.draw();
    });
});
