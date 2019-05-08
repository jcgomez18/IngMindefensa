<?php
include('../modelos/batallon.php');

$entro = true;
$modelo_batallon = new batallon();

if(isset($_GET["act"])){


	switch ($_GET["act"]) {
		case 'obtenerBatallones':
        $res = $modelo_batallon->obtenerBatallones();
  			echo json_encode( (array)$res);
				$entro = false;

    break;


		default:

			$res ="Funcion no reconocida";
			break;
	}
}else{
	$res ="Funcion no reconocida";
}


if(isset($_POST["act"])){

	switch ($_POST["act"]) {
		case 'obtenerBatallonId':
				if(isset($_POST['id']))
				$res = $modelo_batallon->obtenerBatallonID($_POST['id']);
				//var_dump($res->msg);
				$modelo_batallon->response->bool = true;
				$modelo_batallon->response->msg = $res->msg;

		break;
		case 'cargarImagen':

				var_dump("CTRL");
				var_dump($_FILES);
				var_dump($_POST['files']);
				var_dump($_POST['data']);

				$res = $modelo_batallon->cargarImagen($_FILES);
				$modelo_batallon->response->bool = true;
				$modelo_batallon->response->msg = $res->msg;

		break;
		case 'editarBatallon':
				$res = $modelo_batallon->editarBatallon($_POST["id"],$_POST["data"]);
				$modelo_batallon->response->bool = true;
				$modelo_batallon->response->msg = $res->msg;

		break;


		default:

			$res ="Funcion no reconocida POST";
			break;
	}
}else{
	$res ="Funcion no reconocida POST";
}



if($entro){

	echo json_encode( (array)$modelo_batallon->response);
}


?>
