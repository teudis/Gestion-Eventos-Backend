<?php

require_once("conectorDB.php");

class Events
{
	private $events;
	
	public function get_events(){
		$consulta = " SELECT 
  coll_events.id,
  coll_events.date_beg,
  coll_events.date_end,
  coll_events_info.name
FROM
  coll_events
  INNER JOIN city ON (coll_events.city_id_event = city.id)
  INNER JOIN coll_events_info ON (coll_events.id = coll_events_info.events_id)";
		$valores = null;
		
		$oConectar = new conectorDB; //instanciamos conector
		$this->events = $oConectar->consultarBD($consulta,$valores);
        
		return $this->events;
	} //Termina funcion obtenerevents();

	public function get_event_city($city)
	{

		$consulta = " SELECT 
		  coll_events.id,
		  coll_events.date_beg,
		  coll_events.date_end,
		  coll_events_info.name
		FROM
		  coll_events
		  INNER JOIN city ON (coll_events.city_id_event = city.id)
		  INNER JOIN coll_events_info ON (coll_events.id = coll_events_info.events_id)
		WHERE
		  city.id = $city";
		$valores = null;
		
		$oConectar = new conectorDB; //instanciamos conector
		$this->events = $oConectar->consultarBD($consulta,$valores);
        
		return $this->events;

	}

	public function get_event_info($id){
		$consulta = " SELECT city.city,
	  coll_events_info.name,
	  language.name AS language,
	  coll_events_info.brief_description,
	  coll_events_info.description,
	  coll_events_schedules.date_beg,
	  coll_events_schedules.date_end
	FROM
	  coll_events
	  INNER JOIN coll_events_info ON (coll_events.id = coll_events_info.events_id)
	  INNER JOIN city ON (coll_events.city_id_event = city.id)
	  INNER JOIN language ON (coll_events_info.language_id = language.id)
	  INNER JOIN coll_events_schedules ON (coll_events.id = coll_events_schedules.events_id)
	WHERE
	  coll_events.id = $id ";
		$valores = null;
		
		$oConectar = new conectorDB; //instanciamos conector
		$this->events = $oConectar->consultarBD($consulta,$valores);
        
		return $this->events;
	} //Termina funcion obtenerevents();

	public function get_last_id()
	{

      $query = "SELECT   MAX(id) AS last_id FROM   coll_events";
      $valores = null;
      $oConectar = new conectorDB; //instanciamos conector
	  $this->events = $oConectar->consultarBD($query,$valores);        
	   return $this->events;

	}

	public function update_event($event_id ,$city_id_event,$date_beg,$date_end,$Outdoor,
		$Formal_Dressed,$Kinds_Family,$NigthLife,$parent_event_id,
		$has_no_collaborator,$collaborator_id,$shown,$has_contact,$has_price_observations,
		$has_price_unique,$price_unique, $has_alternative_latlng,$lat,$lng)
	{


		$registrar = false; //creamos una variable de control
		$consulta = " UPDATE
					  coll_events
					  SET
					  city_id_event = :city_id_event,
					  parent_events_id = :parent_events_id,
					  has_no_collaborator = :has_no_collaborator,
					  collaborator_id = :collaborator_id,
					  date_beg = :date_beg,
					  date_end = :date_end,
					  shown = :shown,
					  has_contact = :has_contact,
					  has_price_observations = :has_price_observations,
					  has_price_unique = :has_price_unique,
					  outdoor = :outdoor,
					  well_dressed = :well_dressed,
					  k_f = :k_f,
					  n_l = :n_l,
					  price_unique = :price_unique,
					  has_aternative_latlng = :has_aternative_latlng,
					  lat = :lat,
					  lng = :lng
					WHERE
					  coll_events.id = :event_id ";
				
		//VALORES PARA REGISTRO
		 $valores = array("city_id_event"=>$city_id_event,
						"parent_events_id"=>$parent_event_id,
						"has_no_collaborator"=>$has_no_collaborator,
						"collaborator_id"=>$collaborator_id,
						"date_beg"=>$date_beg,
						"date_end"=>$date_end,
						"shown"=>$shown,
						"has_contact"=>$has_contact,
						"has_price_observations"=>$has_price_observations,
						"has_price_unique"=>$has_price_unique,
						"outdoor"=>$Outdoor,
						"well_dressed"=>$Formal_Dressed,
						"k_f"=>$Kinds_Family,
						"n_l"=>$NigthLife,
						"price_unique" => $price_unique,
						"has_aternative_latlng"=>$has_alternative_latlng,
						"lat"=>$lat,
						"lng"=>$lng,
						'event_id'=>$event_id
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

	public function get_event_by_id($id)
	{
	   $query = " SELECT * FROM coll_events WHERE coll_events.id = $id";
       $valores = null;
       $oConectar = new conectorDB; //instanciamos conector
	   $this->events = $oConectar->consultarBD($query,$valores);        
	   return $this->events;
	}
	
	
	public function registrarevents($city_id_event,$date_beg,$date_end,$Outdoor,$Formal_Dressed,$Kinds_Family,$NigthLife,$parent_event_id,$has_no_collaborator,$collaborator_id,$shown,$has_contact,$has_price_observations,$has_price_unique,$price_unique, $has_alternative_latlng,$lat,$lng){
        $registrar = false; //creamos una variable de control
		$consulta = " INSERT INTO coll_events (city_id_event, parent_events_id , has_no_collaborator, collaborator_id, date_beg, date_end, shown, has_contact, has_price_observations, has_price_unique,outdoor,well_dressed,k_f,n_l, price_unique, has_aternative_latlng,lat,lng) VALUES (:city_id_event, :parent_events_id , :has_no_collaborator, :collaborator_id,:date_beg, :date_end, :shown, :has_contact, :has_price_observations, :has_price_unique,:outdoor,:well_dressed,:k_f,:n_l, :price_unique, :has_aternative_latlng,:lat,:lng)";
				
		//VALORES PARA REGISTRO
		$valores = array("city_id_event"=>$city_id_event,
						"parent_events_id"=>$parent_event_id,
						"has_no_collaborator"=>$has_no_collaborator,
						"collaborator_id"=>$collaborator_id,
						"date_beg"=>$date_beg,
						"date_end"=>$date_end,
						"shown"=>$shown,
						"has_contact"=>$has_contact,
						"has_price_observations"=>$has_price_observations,
						"has_price_unique"=>$has_price_unique,
						"outdoor"=>$Outdoor,
						"well_dressed"=>$Formal_Dressed,
						"k_f"=>$Kinds_Family,
						"n_l"=>$NigthLife,
						"price_unique" => $price_unique,
						"has_aternative_latlng"=>$has_alternative_latlng,
						"lat"=>$lat,
						"lng"=>$lng
						);
		
		$oConexion = new conectorDB; //instanciamos conector
		$registrar = $oConexion->consultarBD($consulta, $valores);
		
		if($registrar !== false){
			return true;
		}
		else{
			return false;
		}
    } //Termina funcion registrarUsuarios()

    public function remove_event($id)
    {

    	$registrar = false; //creamos una variable de control
		$consulta = " DELETE FROM  coll_events WHERE coll_events.id = $id";
				
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


    
}/// 


?>