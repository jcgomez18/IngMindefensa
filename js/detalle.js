$(document).ready(function(){


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
  		console.log(result);
      $("#id_batallon_g").text(batallon.id);
      $('#nombreBatallon').text(result.msg["nombre"]);
      $('#fuerza').text(result.msg["fuerza"]);
      $('#sede').text(result.msg["sede"]);
      $('#departamento').text(result.msg["departamento"]);
      $('#localizacion').text(result.msg["localizacion"]);
      $('#estado').text(result.msg["estado"]);
      $('#fecha_programada').text(result.msg["fecha_programada"]);
      $('#fecha_visita').text(result.msg["fecha_visita"]);
      $('#cantidad_personas').text(result.msg["cantidad_personas"]);
      $('#seguros_voluntarios').text(result.msg["seguros_voluntarios"]);
      $('#observaciones').text(result.msg["observaciones"]);
      $('#img_principal').attr("src", "img/"+result.msg["img_principal"]);
      $('#lider_visita').text(result.msg["lider_visita"]);
      $('#quien_atiende').text(result.msg["quien_atiende"]);
      $('#seguros_complementarios').text(result.msg["seguros_complementarios"]);
  	//	$('#img_principal').attr("src", "mindefensa/img/"+result.msg["img_principal"]);

  	});
    //$('.id_batallon').text(sessionStorage.getItem("batallon"));


});
