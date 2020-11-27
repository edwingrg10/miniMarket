function listar_tipos() {
    $.ajax({
        url: '../Procesos/control_pedido.php',
        type: 'POST'

    }).done(function(resp) {
        alert(resp);

    })

}

$(document).ready(function() {


    $.ajax({
        type: 'POST',
        url: 'php/cargar_listas.php',
        data: { 'peticion': 'argar_listas' }

    })

    .done(function(lista) {

        })
        .fail(function() {
            alert('hay un error al cargar la lista')
        })
})