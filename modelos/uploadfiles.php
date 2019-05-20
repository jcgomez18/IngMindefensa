<?php
class modelo_uploadfile{

	public function __construct(){
		$this->batallon = new batallon();
	}

	/* Ingresa array de archivos cargados
		retorna Id del archivo
		función definitiva que centraliza y controla el cargue de imagenes para catalogos
	*/


	public function guardar_ruta_archivo($ruta,$rutaMini,$nombreArchivo,$peso,$extension,$id){
		$db = $this->batallon->db;
	//	$query='UPDATE  batallones.batallones set img_principal ="'. $ruta.'"  WHERE idbatallones = '. $id;
		$query='UPDATE  ingetech_batallones.batallones set img_principal ="'. $ruta.'"  WHERE idbatallones = '. $id;

		//	$InsFile = "INSERT INTO batallon (ruta_archivo) VALUES ";
		//	$InsFile .= "('".$ruta."');";
			$resultado = $this->bd->hacer_consulta($InsFile);
			if($resultado){
				$this->intelcost->response->bool = true;
				$this->intelcost->response->msg ="Se guardo la foto";
			}else{
				$this->intelcost->response->bool = false;
				$this->intelcost->response->msg ='No guardo el archivo';
			}

		return $this->intelcost->response;
	}



	public function resizeImagen($ruta, $nombre,$extension,$ancho,$alto){
    	$imagenoriginal = $ruta.$nombre;
    	$bandera=false;
	    if($extension == 'GIF' || $extension == 'gif'){
	    	$imagenOriginal = imagecreatefromgif($imagenoriginal);
	    	$bandera=true;
	    }
	    if($extension == 'jpg' || $extension == 'JPG'){
	    	$imagenOriginal = imagecreatefromjpeg($imagenoriginal);
	    	$bandera=true;
	    }
	    if($extension == 'png' || $extension == 'PNG'){
	    	$imagenOriginal = imagecreatefrompng($imagenoriginal);
	    	$bandera=true;
	    }
	    if($bandera){
	    	$nueva_ruta=$ruta.'mini/';
	    	if (!file_exists($nueva_ruta)) {
	        	mkdir($nueva_ruta, 0777, true);
	        }
	    	//Abrir foto original
			$ancho_original=imagesx($imagenOriginal);
			$alto_original=imagesy($imagenOriginal);
			$ancho_nuevo=$ancho;
			$alto_nuevo=$alto;
			$copia=imagecreatetruecolor($ancho_nuevo,$alto_nuevo);
			imagecopyresampled($copia,$imagenOriginal,0,0,0,0,$ancho_nuevo,$alto_nuevo,$ancho_original,$alto_original);
			$archivonuevo=$nueva_ruta.$nombre;
			if(imagejpeg($copia,$archivonuevo,100)){
				return $nueva_ruta;
			}else{
				return false;
			}
	    }else{
	    	return false;
	    }


	}
}
?>
