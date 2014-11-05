<?php

require_once("conectorDB.php");

class Events_Info
{
	private $events_info;
	
	public function insert_event_info($events_id, $language_id , $name, $brief_description, $location, $description, $contact, $price_obervations){
        $registrar = false; //creamos una variable de control
		$consulta = " INSERT INTO coll_events_info (events_id, language_id , name, brief_description, location, description, contact, price_obervations) VALUES (:events_id, :language_id , :name, :brief_description, :location, :description, :contact, :price_obervations)";
				
		//VALORES PARA REGISTRO
		$valores = array("events_id"=>$events_id,
						"language_id"=>$language_id,
						"name"=>$name,
						"brief_description"=>$brief_description,
						"location"=>$location,
						"description"=>$description,
						"contact"=>$contact,
						"price_obervations"=>$price_obervations
						);
		
		$oConexion = new conectorDB; //instanciamos conector
		$registrar = $oConexion->consultarBD($consulta, $valores);
		
		if($registrar !== false){
			return true;
		}
		else{
			return false;
		}
    } //Termina funcion events_info()

    public function remove_event_info($id, $language)
    {

    	 $registrar = false; //creamos una variable de control
		 $consulta = " DELETE FROM coll_events_info WHERE  coll_events_info.events_id = $id AND  coll_events_info.language_id = $language";
				
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


    public function update_event_info($events_id, $language_id , $name, $brief_description, $location, $description, $contact, $price_obervations)
    {

    	$registrar = false; //creamos una variable de control
		 $consulta = " UPDATE   coll_events_info SET
  			coll_events_info.language_id = :language_id,
	  	coll_events_info.name = :name,
	  	coll_events_info.brief_description = :brief_description,
	  	coll_events_info.location = :location,
	  	coll_events_info.description = :description,
	  	coll_events_info.contact = :contact,
	  	coll_events_info.price_obervations = :price_obervations
		WHERE
  		coll_events_info.events_id = :events_id ";
				
		//VALORES PARA REGISTRO
		 $valores = array("events_id"=>$events_id,
						"language_id"=>$language_id,
						"name"=>$name,
						"brief_description"=>$brief_description,
						"location"=>$location,
						"description"=>$description,
						"contact"=>$contact,
						"price_obervations"=>$price_obervations
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


    public function get_language($id){

    	$consulta = "SELECT coll_events_info.language_id FROM  coll_events_info WHERE 
    	  coll_events_info.events_id = $id ";
		$valores = null;
		
		$oConectar = new conectorDB; //instanciamos conector
		$this->events_info = $oConectar->consultarBD($consulta,$valores);
        
		return $this->events_info;

    }


    public function get_event_info_id($id)
    {

    		$consulta = " SELECT * FROM coll_events_info WHERE coll_events_info.events_id = $id ";
		$valores = null;
		
		$oConectar = new conectorDB; //instanciamos conector
		$this->events_info = $oConectar->consultarBD($consulta,$valores);
        
		return $this->events_info;
    }
}/// 


?>