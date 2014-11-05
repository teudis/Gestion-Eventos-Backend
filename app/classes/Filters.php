<?php

require_once("conectorDB.php");

class Filters
{
	private $filters;
	
	

    
    public function get_by_content($content_id)
    {
    	// $category = int $category;
    	$consulta = " SELECT * FROM   coll_filters  INNER JOIN content_to_city ON (coll_filters.content_to_city_id = content_to_city.id)
		WHERE
  		coll_filters.content_to_city_id = $content_id ";
		$valores = null;
		
		$oConectar = new conectorDB; //instanciamos conector
		$this->filters = $oConectar->consultarBD($consulta,$valores);        
		return $this->filters;

    } // get by id content_to_city

    


}///  end class


?>