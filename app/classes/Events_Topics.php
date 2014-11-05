<?php

require_once("conectorDB.php");

class Events_Topics
{
	
	private $event_topics;

	
    public function get_event_topics($id)
	{
	   $query = " SELECT * FROM coll_events_topics_translation WHERE coll_events_topics_translation.language_id = $id ";
       $valores = null;
       $oConectar = new conectorDB; //instanciamos conector
	   $this->event_topics = $oConectar->consultarBD($query,$valores);        
	   return $this->event_topics;
	}



	public function insert_events_topic($events_id,$topics_id){
        $registrar = false; //creamos una variable de control
		$consulta = " INSERT INTO coll_events_to_topics (events_id, topics_id) VALUES (:events_id, :topics_id)";
				
		//VALORES PARA REGISTRO
		$valores = array(	"events_id"=>$events_id,
							"topics_id"=>$topics_id
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


    public function update_event_topic($events_id,$topics_id)
    {


    	 $registrar = false; //creamos una variable de control
		$consulta = "  UPDATE coll_events_to_topics SET 
		 coll_events_to_topics.topics_id = :topics_id
		 WHERE
		  coll_events_to_topics.events_id = :events_id";
				
		//VALORES PARA REGISTRO
		$valores = array(	"events_id"=>$events_id,
							"topics_id"=>$topics_id
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


    public function get_current_topics($id_event)
    {

       $query = " SELECT * FROM coll_events_to_topics WHERE coll_events_to_topics.events_id = $id_event ";
       $valores = null;
       $oConectar = new conectorDB; //instanciamos conector
	   $this->event_topics = $oConectar->consultarBD($query,$valores);        
	   return $this->event_topics;
    }

}


?>