<?php

require_once("conectorDB.php");

class Events_Prices
{
	
	private $event_prices;
	
	public function insert_events_prices($events_id, $age_beg , $age_end ,$price){
        $registrar = false; //creamos una variable de control
		$consulta = " INSERT INTO coll_events_prices (events_id, age_beg , age_end ,price) VALUES (:events_id, :age_beg , :age_end ,:price)";
				
		//VALORES PARA REGISTRO
		$valores = array(	"events_id"=>$events_id,
							"age_beg"=>$age_beg,
							"age_end"=>$age_end,
							"price"=>$price
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

    public function update_event_prices($events_id, $age_beg , $age_end ,$price)
    {


    	$registrar = false; //creamos una variable de control
		 $consulta = " UPDATE  coll_events_prices SET
		  coll_events_prices.age_beg = $age_beg,
		  coll_events_prices.age_end = $age_end,
		  coll_events_prices.price =   $price
		WHERE
		  coll_events_prices.events_id = $events_id";
				
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


    public function remove_event_prices($id)
    {

    	$registrar = false; //creamos una variable de control
		 $consulta = " DELETE FROM  coll_events_prices WHERE coll_events_prices.events_id = $id ";
				
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


     public function get_prices_by_id($id)
	{
	   $query = " SELECT * FROM coll_events_prices WHERE coll_events_prices.events_id = $id ";
       $valores = null;
       $oConectar = new conectorDB; //instanciamos conector
	   $this->event_prices = $oConectar->consultarBD($query,$valores);        
	   return $this->event_prices;
	}
}/// 


?>