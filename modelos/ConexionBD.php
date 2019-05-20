<?php
// SE DEFINE UNA CLASE QUE MANEJARA TODA LA CONEXION CON LA BASE DE DATOS
class ConexionBD
{
	var $nombre_bd;
	var $nombe_host;
	var $nombre_usu="Julian";
	var $passwd_usu="2019";
	var $nombre_usu_cr="ingetech_batallones";
	var $passwd_usu_cr="SibfTD678%";
	var $enlace;
	var $puerto; //en el servidor sera 2112

//*********************************************************************
	function ConexionBD()
	{
		$this->nombre_bd="batallones";
		//$this->nombre_bd="ingetech_batallones";
		$this->nombre_host="127.0.0.1";
		$this->nombre_usu=$this->nombre_usu; //por defecto
		$this->passwd_usu=$this->passwd_usu; //por defecto
		$this->puerto=3306;

	}
//*********************************************************************
// Metodo que se encarga de establecer la conexion con la base de datos
	function establecer_conexion()
	{
	//	if (!($this->enlace= new mysqli("127.0.0.1", "Julian", "2019", "batallones", 3306)))
		 if (!($this->enlace= new mysqli("163.182.175.102", "ingetech", "T[yAAEokb+^^", "ingetech_batallones", 3306)))
		{
			$this->enlace->set_charset("utf8");

			echo "Error conectando a la base de datos.";
			exit();
		}
		if (!(mysqli_select_db($this->enlace,$this->nombre_bd)))
		{//Conexi�n externa y local
			echo "Error seleccionando la base de datos.";
			echo "la base de datos es: " . $this->nombre_bd;
			exit();
	    }
		//	var_dump($this->enlace);
	}
//*********************************************************************
	function getEnlace()
	{
		return $this->enlace;
	}
//*********************************************************************
//Metodo que se encarga de cerrar la conexion con la bd
	function cerrar_conexion()
	{
		mysqli_close($this->enlace);
	}

//*********************************************************************
	function hacer_consulta($query)
	{
		$resultado= $this->enlace->query($query) or die ("ERROR EN LA CONSULTA segun sentencia $query");
		return $resultado;
	}
//*********************************************************************
	function hacer_actualizacion($query)
	{
		$this->enlace->query($query) or die ("ERROR EN LOS DATOS DEL FORMULARIO segun sentencia $query");
	}

//*********************************************************************
	function cambiarBD($nueva_bd)
	{
		if (!(mysqli_select_db($this->enlace,$nueva_bd)))
		{//Conexi�n externa y local
			echo "Error seleccionando la base de datos.";
			echo "la base de datos es: " . $nueva_bd;
			exit();
		}
		else
		{
			$this->nombre_bd=$nueva_bd;
		}
	}

//*********************************************************************

}
?>
