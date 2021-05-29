<?php

require_once("conectorDB.php");

class Events_Packs
{
	
	private $event_pack;
	
	public function insert_events_packs($events_id, $price , $pack){
        $registrar = false; //creamos una variable de control
		$consulta = " INSERT INTO coll_events_packs (events_id, price , pack) VALUES (:events_id, :price , :pack)";
				
		//VALORES PARA REGISTRO
		$valores = array(	"events_id"=>$events_id,
							"price"=>$price,
							"pack"=>$pack
						);
		
		$oConexion = new conectorDB; //instanciamos conector
		$registrar = $oConexion->consultarBD($consulta, $valores);
		
		if($registrar !== false){
			return true;
		}
		else{
			return false;
		}
    } //Termina funcion coll_events_packs()

    public function update_events_pack($events_id, $price , $pack)
    {


    	$registrar = false; //creamos una variable de control
		$consulta = " UPDATE  coll_events_packs SET
		  coll_events_packs.price = :price,
		  coll_events_packs.pack = :pack
		WHERE
		  coll_events_packs.events_id = :events_id ";
				
		//VALORES PARA REGISTRO
		$valores = array(	"events_id"=>$events_id,
							"price"=>$price,
							"pack"=>$pack
						);
		
		$oConexion = new conectorDB; //instanciamos conector
		$registrar = $oConexion->consultarBD($consulta, $valores);
		
		if($registrar !== false){
			return true;
		}
		else{
			return false;
		}



    }

    public function remove_event_pack($id)
    {

    	$registrar = false; //creamos una variable de control
		 $consulta = " DELETE FROM coll_events_packs WHERE  coll_events_packs.events_id = $id ";
				
		//VALORES PARA REGISTRO
		 $valores = null;
		
		 $oConexion = new conectorDB; //instanciamos conector
		 $registrar = $oConexion->consultarBD($consulta, $valores);
		
		if($registrar !== false){
			return true;
		}
		else{
			return false;
		}



    }

    public function get_pack_by_id($id)
	{
	   $query = " SELECT * FROM  coll_events_packs WHERE coll_events_packs.events_id = $id ";
       $valores = null;
       $oConectar = new conectorDB; //instanciamos conector
	   $this->event_pack = $oConectar->consultarBD($query,$valores);        
	   return $this->event_pack;
	}



}/// 


?>