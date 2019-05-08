$(document).ready(function(){
console.log("holaP");

$.ajax({
  type: 'GET',
  url: '../controladores/ctrl_batallon.php',
  data: { act: 'obtenerBatallones'},
  dataType: 'JSON',
}).done(function(result) {
  console.log(result);

  if(result.bool){
    console.log("CHimbaP");

  }else{
      console.log("pailaP");
  //  swal("Algo fallo!", result.msg, "error");
  }
});

});
