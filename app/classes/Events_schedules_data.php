<?php

require_once("conectorDB.php");

class Events_schedules_data
{
	private $events_schedules_data;
	
	public function insert_events_schedules_data($coll_events_schedules_id,$day_id,$time_beg,$time_end){
        $registrar = false; //creamos una variable de control
		$consulta = " INSERT INTO coll_events_schedules_data (coll_events_schedules_id,day_id, time_beg , time_end) VALUES (:coll_events_schedules_id, :day_id , :time_beg, :time_end)";
				
		//VALORES PARA REGISTRO
		$valores = array("coll_events_schedules_id"=>$coll_events_schedules_id,
						"day_id"=>$day_id,
						"time_beg"=>$time_beg,
						"time_end"=>$time_end
						);
		
		$oConexion = new conectorDB; //instanciamos conector
		$registrar = $oConexion->consultarBD($consulta, $valores);
		
		if($registrar !== false){
			return true;
		}
		else{
			return false;
		}
    } //Termina funcion insert_events_schedules_data


    public function update_event_schedule_data($coll_events_schedules_id,$day_id,$time_beg,$time_end)
    {


    	$registrar = false; //creamos una variable de control
		 $consulta = " UPDATE  coll_events_schedules_data SET
		  coll_events_schedules_data.day_id = $day_id,
		  coll_events_schedules_data.time_beg = $time_beg,
		  coll_events_schedules_data.time_end = $time_end
		WHERE
		  coll_events_schedules_data.coll_events_schedules_id = $coll_events_schedules_id";
						
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

    public function remove_schedule_data($id)
    {


    	$registrar = false; //creamos una variable de control
		 $consulta = " DELETE FROM  coll_events_schedules_data WHERE  coll_events_schedules_data.coll_events_schedules_id = $id ";
				
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


    public function remove_schedule_data_id($id)
    {


    	$registrar = false; //creamos una variable de control
		 $consulta = " DELETE FROM coll_events_schedules_data WHERE
  			coll_events_schedules_data.id = $id ";
				
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