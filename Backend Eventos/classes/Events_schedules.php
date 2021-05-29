<?php

require_once("conectorDB.php");

class Events_schedules
{
	private $events_schedules;
	
	public function insert_events_schedules($events_id,$date_begin,$date_end,$shown,$notes){
        $registrar = false; //creamos una variable de control
		$consulta = " INSERT INTO coll_events_schedules (events_id, date_beg , date_end, shown, notes) VALUES (:events_id, :date_beg , :date_end, :shown, :notes)";
				
		//VALORES PARA REGISTRO
		$valores = array("events_id"=>$events_id,
						"date_beg"=>$date_begin,
						"date_end"=>$date_end,
						"shown"=>$shown,
						"notes"=>$notes
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

    public function update_event_schedule($events_id,$date_begin,$date_end,$shown,$notes)
    {


    	 $registrar = false; //creamos una variable de control
		 $consulta = " UPDATE  coll_events_schedules SET
		  coll_events_schedules.date_beg = :date_beg,
		  coll_events_schedules.date_end = :date_end,
		  coll_events_schedules.shown = :shown,
		  coll_events_schedules.notes = :notes
		WHERE
		  coll_events_schedules.events_id = :events_id";
						
		//VALORES PARA REGISTRO
		 $valores = array("events_id"=>$events_id,
						"date_beg"=>$date_begin,
						"date_end"=>$date_end,
						"shown"=>$shown,
						"notes"=>$notes
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

    public function get_last_id(){


   	  $query = "SELECT MAX(id) AS last_id FROM coll_events_schedules";
      $valores = null;
      $oConectar = new conectorDB; //instanciamos conector
	  $this->events_schedules = $oConectar->consultarBD($query,$valores);        
	   return $this->events_schedules;
   } // end  get las id

   public function get_by_id($id)
   {

   		$consulta = " SELECT * FROM  coll_events_schedules WHERE  coll_events_schedules.events_id = $id";
		$valores = null;
		
		$oConectar = new conectorDB; //instanciamos conector
		$this->events_schedules = $oConectar->consultarBD($consulta,$valores);
        
		return $this->events_schedules;

   } 


   

   public function get_schedule_data_id($id)
   {

   	$consulta = " SELECT * FROM   coll_events_schedules_data WHERE
  	coll_events_schedules_data.coll_events_schedules_id = $id ";
		$valores = null;		
		$oConectar = new conectorDB; //instanciamos conector
		$this->events_schedules = $oConectar->consultarBD($consulta,$valores);
        
		return $this->events_schedules;
   }

   public function remove_schedule_data($id)
   {

   		$registrar = false; //creamos una variable de control
		 $consulta = " DELETE FROM coll_events_schedules WHERE coll_events_schedules.events_id = $id ";
				
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