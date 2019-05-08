<?php
  session_start();
  require_once('ConexionBD.php');
  $rta = new batallon();


  class batallon
  {
    public $rta;
    public $bd;
    public $nombre;
    public $id;

    public function __construct(){
      $this->response = new stdClass();
			$this->response->bool = false;
			$this->response->msg ="respuesta no asignada";
      $this->bd = new ConexionBD();
      $this->bd->establecer_conexion();


    }


      public function obtenerBatallones(){
        $query="SELECT * FROM batallones";
        $resultado = $this->bd->hacer_consulta($query);
        // var_dump($resultado);
        if (mysqli_num_rows($resultado)!=0){
          $arrBatallones = [];
          while ($fila = $resultado->fetch_row() ) {
            //var_dump($fila);
            $res["id"]=($fila[0]);
            $res["nombre"]= (utf8_encode($fila[1]));
            $res["fuerza"]= ($fila[2]);
            $res["sede"]= (utf8_encode($fila[3]));
            $res["departamento"]= (utf8_encode($fila[4]));
            $res["localizacion"]= (utf8_encode($fila[5]));
            $res["estado"]= ($fila[6]);
            $res["fecha_programada"]= ($fila[7]);
            $res["fecha_visita"]= ($fila[8]);
            $res["observaciones"]= ($fila[9]);
            $res["cantidad_personas"]= ($fila[10]);
            $res["seguros_voluntarios"]= ($fila[11]);

              array_push($arrBatallones, $res);

            }
            //var_dump($arrBatallones);

          $this->response->bool = true;
          $this->response->msg = $arrBatallones;
        }else{
          $this->response->bool = false;
          $this->response->msg ="sin resultados";
        }


      	return $arrBatallones;
      }

      public function obtenerBatallonId($id){

        $query="SELECT * FROM batallones WHERE idbatallones = ". $id;
        $resultado = $this->bd->hacer_consulta($query);
        if (mysqli_num_rows($resultado)!=0){
          //var_dump($resultado);

          $fila = $resultado->fetch_row() ;
            //var_dump($fila);
            $res["id"]=($fila[0]);
            $res["nombre"]= utf8_encode($fila[1]);
            $res["fuerza"]= ($fila[2]);
            $res["sede"]= utf8_encode($fila[3]);
            $res["departamento"]= utf8_encode($fila[4]);
            $res["localizacion"]= utf8_encode($fila[5]);
            $res["estado"]= ($fila[6]);
            $res["fecha_programada"]= ($fila[7]);
            $res["fecha_visita"]= ($fila[8]);
            $res["observaciones"]= ($fila[9]);
            $res["cantidad_personas"]= ($fila[10]);
            $res["seguros_voluntarios"]= ($fila[11]);
            $res["img_principal"]= ($fila[12]);
            $res["img_secundaria"]= ($fila[13]);
            $res["lider_visita"]= ($fila[14]);
            $res["quien_atiende"]= ($fila[15]);
            $res["seguros_complementarios"]= ($fila[16]);

            //$img_principal =($fila[12]);



          $this->response->bool = true;
          $this->response->msg = $res;
        }else{
          $this->response->bool = false;
          $this->response->msg ="sin resultados";
        }


        return $this->response;
      }

  public function cargarImagen($files){
    var_dump("HOLA");
    var_dump($files);

  }
  public function editarBatallon($id,$data){
    $object = json_decode(json_encode($data), FALSE);
    $query='UPDATE  ingetech_batallones.batallones set localizacion ="'. $object[0]->value.'",lider_visita ="'.$object[1]->value.'",quien_atiende = "'.$object[2]->value.'",fecha_programada = "'.$object[3]->value.'",fecha_visita = "'.$object[4]->value.'",cantidad_personas ="'.$object[5]->value.'",seguros_voluntarios = "'.$object[6]->value.'",seguros_complementarios="'.$object[7]->value.'",observacion="'.$object[8]->value.'"  WHERE idbatallones = '. $id;

    //$query='UPDATE  batallones.batallones set localizacion ="'. $object[0]->value.'",lider_visita ="'.$object[1]->value.'",quien_atiende = "'.$object[2]->value.'",fecha_programada = "'.$object[3]->value.'",fecha_visita = "'.$object[4]->value.'",cantidad_personas ="'.$object[5]->value.'",seguros_voluntarios = "'.$object[6]->value.'",seguros_complementarios="'.$object[7]->value.'",observacion="'.$object[8]->value.'"  WHERE idbatallones = '. $id;

   $resultado = $this->bd->hacer_consulta($query);
   //var_dump($resultado);

   if($resultado){
     $this->response->bool = true;
     $this->response->msg = "Se actualizo el batallon correctamente";
   }else{
     $this->response->bool = false;
     $this->response->msg = "Error en la consulta de edicion de batallon";

   }


  }




 }

?>
