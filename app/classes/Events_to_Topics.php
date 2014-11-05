<?php

require_once("conectorDB.php");

class Events_to_Topics
{
	
	private $event_to_topics;

	
    public function get_all_event_to_topics()
	{
	   $query = " SELECT * FROM coll_events_to_topics ";
       $valores = null;
       $oConectar = new conectorDB; //instanciamos conector
	   $this->event_to_topics = $oConectar->consultarBD($query,$valores);        
	   return $this->event_to_topics;
	}

	public function get_event_to_topics_id($id)
	{
	   $query = " SELECT * FROM coll_events_to_topics WHERE coll_events_to_topics.events_id = $id ";
       $valores = null;
       $oConectar = new conectorDB; //instanciamos conector
	   $this->event_to_topics = $oConectar->consultarBD($query,$valores);        
	   return $this->event_to_topics;
	}

	public function update_event_to_topics($events_id,$topics_id)
	{

		$registrar = false; //creamos una variable de control
		 $consulta = " UPDATE coll_events_to_topics SET 
		 coll_events_to_topics.topics_id = $topics_id
		 WHERE
		  coll_events_to_topics.events_id = $events_id";
				
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

	public function remove_event_to_topics($id)
	{

		$registrar = false; //creamos una variable de control
		 $consulta = " DELETE FROM coll_events_to_topics WHERE coll_events_to_topics.events_id = $id ";
				
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

}


?>