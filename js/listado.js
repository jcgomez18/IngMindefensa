
$(document).ready(function(){

//sessionStorage.removeItem("batallon");

     var table = $('#example').DataTable( {
      "language": {

        	"sProcessing":     "Procesando...",
        	"sLengthMenu":     "Mostrar _MENU_ registros",
        	"sZeroRecords":    "No se encontraron resultados",
        	"sEmptyTable":     "Ningún dato disponible en esta tabla",
        	"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        	"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
        	"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        	"sInfoPostFix":    "",
        	"sSearch":         "Buscar:",
        	"sUrl":            "",
        	"sInfoThousands":  ",",
        	"sLoadingRecords": "Cargando...",
        	"oPaginate": {
        		"sFirst":    "Primero",
        		"sLast":     "Último",
        		"sNext":     "Siguiente",
        		"sPrevious": "Anterior"
        	},
        	"oAria": {
        		"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        		"sSortDescending": ": Activar para ordenar la columna de manera descendente"
        	}

      },
        "ajax": {
        //  "url": "../controladores/ctrl_batallon.php",
          "url": "../mindefensa/controladores/ctrl_batallon.php",
          "type": "GET",
          "data": { "act": 'obtenerBatallones'},
          "dataSrc":""
        },
        "columns": [
        { "data": "id" },
        { "data": "nombre" },
        { "data": "fuerza" },
        { "data": "sede" },
        { "data": "departamento" },
        { "data": "localizacion" },
        { "data": "estado" },
        { "data": "fecha_programada" },
        { "data": "fecha_visita" }
        ]
    } );


    $('#example tbody').on( 'click', 'tr', function () {
            var tr = $(this).closest('tr');
            var row = table.row( tr );
            var srow = JSON.stringify(row.data());
          //   $row.child( format(row.data()) ).show();
          //  window.location = "../detalle.php"
            window.location = "../mindefensa/detalle.php"

            sessionStorage.setItem("batallon",srow);
            //$('.id_batallon').text("item 3");
        } );






});
