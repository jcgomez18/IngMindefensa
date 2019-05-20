$(document).ready(function() {
  //$("#inputFoto").hide();
  var nombreFoto1 = " ";
  var batallon = JSON.parse(sessionStorage.getItem("batallon"));
  //console.log(batallon);
  $("#id_batallon").text(batallon.id);


  $.ajax({
    type: "POST",
  //  url: "../controladores/ctrl_batallon.php",
    	url: "../mindefensa/controladores/ctrl_batallon.php",
    data: {
      act: 'obtenerBatallonId',
      id: batallon.id
    },
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
    $('#img_principal').attr("src", "./mindefensa/"+result.msg["img_principal"]);
    //$('#img_principal').attr("src", result.msg["img_principal"]);
    $('#lider_visita').val(result.msg["lider_visita"]);
    $('#quien_atiende').val(result.msg["quien_atiende"]);
    $('#seguros_complementarios').val(result.msg["seguros_complementarios"]);
    //	$('#img_principal').attr("src", "mindefensa/img/"+result.msg["img_principal"]);

  });
  //$('.id_batallon').text(sessionStorage.getItem("batallon"));


});

var subir = function(input) {

  nombreFoto1 = input.files[0].name;



};

$.fn.upload = function (remote, data, successFn, progressFn) {
    // if we dont have post data, move it along
    if (typeof data != "object") {
        progressFn = successFn;
        successFn = data;
    }
    return this.each(function () {
        if ($(this)[0].files[0]) {
            var formData = new FormData();
            var $input = $(this);

            // add 1
            if ($(this)[0].files.length == 1) {
                formData.append($(this).attr("name"), $(this)[0].files[0]);

                // add many files
            } else {
                $.each($(this)[0].files, function (i, file) {
                    formData.append($input.attr("name") + "[]", file);
                });
            }

            // if we have post data too
            if (typeof data == "object") {
                for (var i in data) {
                    formData.append(i, data[i]);
                }
            }

            // do the ajax request
            $.ajax({
                url: remote,
                type: 'POST',
                async: false,
                xhr: function () {
                    myXhr = $.ajaxSettings.xhr();
                    if (myXhr.upload && progressFn) {
                        myXhr.upload.addEventListener('progress', function (prog) {

                            var value = ~~((prog.loaded / prog.total) * 100);

                            // if we passed a progress function
                            if (progressFn && typeof progressFn == "function") {
                                progressFn(prog, value);

                                // if we passed a progress element
                            } else if (progressFn) {
                                $(progressFn).val(value);
                            }
                        }, false);
                    }
                    return myXhr;
                },
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                complete: function (res) {
                    if (successFn)
                        successFn(res.responseText);
                }
            });
        }
    });
};


$('#editar_form').submit(function(e) {
  e.preventDefault();
  var batallon = JSON.parse(sessionStorage.getItem("batallon"));
  var data = $(this).serializeArray();

  $('.imagenCarga').each(function(index) {
      //Si ya tiee id es porque ya existia en la ofera

      $(this).upload(
        //"../controladores/ctrl_uploadfiles.php",
          "../mindefensa/controladores/ctrl_uploadfiles.php",
        {
          categoriaArchivo: "foto",
          recurso_id: batallon.id,
        },
        function(success) {
          var data = JSON.parse(success);
          if (data.bool) {
            var dataCompleta = JSON.parse(data.msg);
            //console.log(dataCompleta)
            actualizarImgBatallon(batallon.id,dataCompleta.ruta,dataCompleta.nombre_archivo);

          } else {
            console.log("error subiendo un documento");
          }

          //Barra de carga salida de carga


        }
      );
  });

  $.ajax({
    type: "POST",
  //  url: "../controladores/ctrl_batallon.php",
  	url: "../mindefensa/controladores/ctrl_batallon.php",
    data: { act: 'editarBatallon',id:batallon.id,data:data},
    dataType: "json",
  }).done(function(result) {
    //console.log(result);
    alert("Se realizó la actualizacion correctamente");
    //  window.location = "./listado_editar.php";
  //  window.location = "../mindefensa/listado_editar.php";
  //	$('#img_principal').attr("src", "mindefensa/img/"+result.msg["img_principal"]);

  });









});




var actualizarImgBatallon = function (batallon_id,ruta,nombre){
  var batallon = JSON.parse(sessionStorage.getItem("batallon"));
  var rutaCompleta = ruta + nombre;
  $.ajax({
    type: "POST",
    //url: "../controladores/ctrl_batallon.php",
  	url: "../mindefensa/controladores/ctrl_batallon.php",
    data: { act: 'editarfotoBatallon',id:batallon.id,ruta:rutaCompleta},
    dataType: "json",
  }).done(function(result) {
    alert("Se subio la imagen al servidor");

  //  window.location = "../mindefensa/listado_editar.php"
  //	$('#img_principal').attr("src", "mindefensa/img/"+result.msg["img_principal"]);

  });

}



var editarFoto = function () {

  $("#inputFoto").show();

}
