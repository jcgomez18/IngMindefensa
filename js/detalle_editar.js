$(document).ready(function(){

    var nombreFoto1 = " ";
    var batallon = JSON.parse(sessionStorage.getItem("batallon"));
    //console.log(batallon);
    $("#id_batallon").text(batallon.id);


    $.ajax({
  		type: "POST",
    //  url: "../controladores/ctrl_batallon.php",
  		url: "../mindefensa/controladores/ctrl_batallon.php",
  		data: { act: 'obtenerBatallonId',id:batallon.id},
  		dataType: "json",
  	}).done(function(result) {
  	//	console.log(result);
      $("#id_batallon_g").text(batallon.id);
      $('#nombreBatallon').text(result.msg["nombre"]);
      $('#fuerza').text(result.msg["fuerza"]);
      $('#sede').text(result.msg["sede"]);
      $('#departamento').text(result.msg["departamento"]);
      $('#localizacion').val(result.msg["localizacion"]);
      $('#estado').val(result.msg["estado"]);
      $('#fecha_programada').val(result.msg["fecha_programada"]);
      $('#fecha_visita').val(result.msg["fecha_visita"]);
      $('#cantidad_personas').val(result.msg["cantidad_personas"]);
      $('#seguros_voluntarios').val(result.msg["seguros_voluntarios"]);
      $('#observaciones').val(result.msg["observaciones"]);
      $('#img_principal').attr("src", "img/"+result.msg["img_principal"]);
      $('#lider_visita').val(result.msg["lider_visita"]);
      $('#quien_atiende').val(result.msg["quien_atiende"]);
      $('#seguros_complementarios').val(result.msg["seguros_complementarios"]);
  	//	$('#img_principal').attr("src", "mindefensa/img/"+result.msg["img_principal"]);

  	});
    //$('.id_batallon').text(sessionStorage.getItem("batallon"));


});

var subir  = function(input){

  nombreFoto1 = input.files[0].name;



};


$('#editar_formss').submit(function(e) {
  console.log(e)

	//e.preventDefault();
  var data = $(this).serializeArray();
//  var foto = $("#imagen").files[0];
	//var foto_general = $("#foto_general").val();
	//var foto_satelital = $("#foto_satelital").val();
  console.log(data);
  //console.log(nombreFoto1);
	//console.log(foto.split('\'' ));
  //console.log(foto.replace("\"file,"/"));

});

$('#editar_form').submit(function(e) {
  e.preventDefault();
  var batallon = JSON.parse(sessionStorage.getItem("batallon"));
  var data = $(this).serializeArray();
  $.ajax({
    type: "POST",
  //  url: "../controladores/ctrl_batallon.php",
  	url: "../mindefensa/controladores/ctrl_batallon.php",
    data: { act: 'editarBatallon',id:batallon.id,data:data},
    dataType: "json",
  }).done(function(result) {
    console.log(result);
    alert("Se realizó la actualizacion correctamente");
    window.location = "../mindefensa/listado_editar.php"
  //	$('#img_principal').attr("src", "mindefensa/img/"+result.msg["img_principal"]);

  });
  // $.ajax({
  //     type: "POST",
  //     url: "../controladores/ctrl_batallon.php",
  //   //	url: "../mindefensa/controladores/ctrl_contratos.php",
  //     data: { act: 'cargarImagen',files:files,data:data},
  //     dataType: "json",
  //   }).done(function(result) {
  //     console.log(result);
  //
  //   //	$('#img_principal').attr("src", "mindefensa/img/"+result.msg["img_principal"]);
  //
  //   });




});
