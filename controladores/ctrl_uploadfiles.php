<?php
// este modulo recibe parametros get categoriaArchivo , modulo_recurso (modulo que usta este recurso)
include('../modelos/batallon.php');
include('../modelos/uploadfiles.php');

$modelo_batallon = new batallon();
$modelo_uploadfile = new modelo_uploadfile();

if(!isset($_FILES['file']) ){
    $modelo_batallon->response->bool = false;
    $modelo_batallon->response->msg ="Acceso invalido ";
} else {

    if(isset($_POST["categoriaArchivo"])){

        $recurso_id = $_POST["recurso_id"];
        $nombre_archivo = $_FILES["file"]["name"];
        $peso_archivo = $_FILES["file"]["size"];
        $nomtemp_archivo = $_FILES['file']['tmp_name'];
        switch($_POST["categoriaArchivo"]):
            case "foto":
                $ruta = "../img/batallones/batallon_" . $recurso_id . "/";
            //    $ruta = "../mindefensa/img/batallones/batallon_" . $recurso_id . "/";
                break;
            case "documentosoferentes":
                $ruta = "../ic_files/".$_SESSION["cliente_nombre"]."/".$moduloRecurso."/" . $recurso_id . "/documentosoferentes/";
                break;
            case "documentosEvaluacionoferta":
                $ruta = "../ic_files/".$_SESSION["cliente_nombre"]."/".$moduloRecurso."/" . $recurso_id . "/documentosEvaluacionoferta/";
                break;
            case "documentosbiblioteca":
                $ruta = "../ic_files/".$_SESSION["cliente_nombre"]."/".$moduloRecurso."/" . $recurso_id . "/";
                break;
            case "imagenesProductos":
                $ruta = "../ic_files/".$_SESSION["cliente_nombre"]."/".$moduloRecurso."/" . $recurso_id . "/";
                $Insertabd = true;
            break;
            case 'imagenesCatalogos':
                $ruta = "../ic_files/".$_SESSION["cliente_nombre"]."/".$moduloRecurso."/" . $recurso_id . "/";
                $Insertabd = true;
            break;
            case 'adjuntosAuditoria':
                $ruta = "../ic_files/".$_SESSION["cliente_nombre"]."/".$moduloRecurso."/" . $recurso_id . "/";
                $Insertabd = true;
            break;
            case "cartaInvitacion":
                $idUsuario =$_POST["usr"];
                $ruta = "../ic_files/".$_SESSION["cliente_nombre"]."/".$moduloRecurso."/" . $recurso_id . "/documentosoferta/cartasinvitacion/".$idUsuario. "/";
                $actualizarCarta = true;
            break;
            case "contratoInicial":
                $ruta = "../ic_files/".$_SESSION["cliente_nombre"]."/".$moduloRecurso."/" . $recurso_id . "/preliminar/";
                $contrato = true;
                break;
            case "observaciones":
                $ruta = "../ic_files/".$_SESSION["cliente_nombre"]."/".$moduloRecurso."/" . $recurso_id . "/observaciones/";
                $contrato = true;
                break;
            case "polizas":
                $ruta = "../ic_files/".$_SESSION["cliente_nombre"]."/".$moduloRecurso."/" . $recurso_id . "/polizas/";
                $contrato = true;
                break;
            case "acta_inicio":
                $ruta = "../ic_files/".$_SESSION["cliente_nombre"]."/".$moduloRecurso."/" . $recurso_id . "/actaInicio/";
                $contrato = true;
                break;
            case "acta_entrega":
                $ruta = "../ic_files/".$_SESSION["cliente_nombre"]."/".$moduloRecurso."/" . $recurso_id . "/actaEntrega/";
                $contrato = true;
                break;
            case "adendo":
                $ruta = "../ic_files/".$_SESSION["cliente_nombre"]."/".$moduloRecurso."/" . $recurso_id . "/adendos/";
                $contrato = true;
                break;

            case "liquidacion":
                $ruta = "../ic_files/".$_SESSION["cliente_nombre"]."/".$moduloRecurso."/" . $recurso_id . "/liquidacion/";
                $contrato = true;
                break;


            default:
                $ruta = "../ic_files/".$_SESSION["cliente_nombre"]."/".$moduloRecurso."/" . $recurso_id . "/sinCategorizar/";
                break;

        endswitch;


        $_FILES["documentos"]["error"];
            if (!file_exists($ruta)) {
                mkdir($ruta, 0777, true);
            }

            /*$Name = preg_replace('[\s+]', '', mysql_real_escape_string(str_replace("'","",$nombre_archivo)));
            $Name = str_replace("#","",$Name);
            $Name = str_replace("%","",$Name);
            $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿ';
            $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyyby';
            $cadena = utf8_decode($Name);
            $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
            $nombre_archivo = str_replace(' ', '', utf8_encode($cadena));*/

            $path = pathinfo($nombre_archivo);
            $ext = $path["extension"];
            $name = $path["filename"];
            $no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
            $permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
            $name = strtolower(str_replace($no_permitidas, $permitidas ,$name));
            $name = preg_replace('([^A-Za-z0-9])', '', $name);
            $secStr = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789',5)),0,5);
            $nombre_archivo=$name."-".$secStr.".".$ext;

            $extensionesNOPermitidas = array('php','exe','sql','bat');
            if( !in_array ( $ext , $extensionesNOPermitidas ) ){

                if (move_uploaded_file($nomtemp_archivo, $ruta . $nombre_archivo)) {
                    if($Insertabd){
                        $ruta_mini=$modelo_uploadfile->resizeImagen($ruta, $nombre_archivo,$ext,800, 500);

                        $res=$modelo_uploadfile->guardar_ruta_archivo($ruta,$ruta_mini,$nombre_archivo,$peso_archivo,$ext, $recurso_id);

                        $modelo_batallon->response = $res;
                        $datarespuesta["id_archivo"] = $res->msg;
                    }
                    $modelo_batallon->response->bool = true;
                    $datarespuesta["texto"] ="Transferencia completa";
                    $datarespuesta["ruta"] =$ruta;
                    $datarespuesta["nombre_archivo"] =$nombre_archivo;
                    $modelo_batallon->response->msg = json_encode($datarespuesta);
                } else {
                    $modelo_batallon->response->bool = false;
                    $modelo_batallon->response->msg = "error en copia de archivo";
                }
            }else {
                $modelo_batallon->response->bool = false;
                $modelo_batallon->response->msg = " El tipo de archivo ".$ext." no es valido, en el caso del archivo ".$nombre_archivo;
            }
    } else {
        $modelo_batallon->response->bool = false;
        $modelo_batallon->response->msg == "Categoria indefinida de archivo";
    }
}
echo json_encode((array) $modelo_batallon->response);
?>
