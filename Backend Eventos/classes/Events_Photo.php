<?php

require_once("conectorDB.php");

class Events_Photo
{
	
	private $event_photo;

	public function insert_events_photo($events_id, $path , $cover ){
        $registrar = false; //creamos una variable de control
		$consulta = " INSERT INTO coll_events_photo (events_id, path , is_cover) VALUES (:events_id, :path , :is_cover)";
				
		//VALORES PARA REGISTRO
		$valores = array(	"events_id"=>$events_id,
							"path"=>$path,
							"is_cover"=>$cover,
							
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

    public function update_event_photo($events_id, $path , $cover)
    {


    	$registrar = false; //creamos una variable de control
		 $consulta = " UPDATE coll_events_photo SET
		  coll_events_photo.path = $path,
		  coll_events_photo.is_cover = $cover,
		  coll_events_photo.copyright = NULL
		WHERE
		  coll_events_photo.events_id = $events_id ";
				
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

    public function remove_event_photo($id)
    {


    	$registrar = false; //creamos una variable de control
		 $consulta = " DELETE FROM coll_events_photo WHERE coll_events_photo.events_id = $id";
				
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


    public function get_photo_by_id($id)
	{
	   $query = " SELECT * FROM coll_events_photo WHERE coll_events_photo.events_id = $id ";
       $valores = null;
       $oConectar = new conectorDB; //instanciamos conector
	   $this->event_photo = $oConectar->consultarBD($query,$valores);        
	   return $this->event_photo;
	}

	public function get_photo_path($path)
	{

	  $query = " SELECT * FROM  coll_events_photo WHERE coll_events_photo.path = '$path' ";
      $valores = null;
      $oConectar = new conectorDB; //instanciamos conector
	  $this->event_photo = $oConectar->consultarBD($query,$valores);        
	  return $this->event_photo;	


	}

}/// 


?>