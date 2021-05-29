<?php

require_once("conectorDB.php");

class Control
{
	
	
	public function insert_control($content_to_city_id, $shown , $published ,$status){
        $registrar = false; //creamos una variable de control
		$consulta = " INSERT INTO coll_control (content_to_city_id, shown , published ,status) VALUES (:content_to_city_id, :shown , :published ,:status)";
				
		//VALORES PARA REGISTRO
		$valores = array(	"content_to_city_id"=>$content_to_city_id,
							"shown"=>$shown,
							"published"=>$published,
							"status"=>$status
						);
		
		
		$oConexion = new conectorDB; //instanciamos conector
		$registrar = $oConexion->consultarBD($consulta, $valores);
		
		if($registrar !== false){
			return true;
		}
		else{
			return false;
		}
    } //
}/// 


?>