<?php

require_once("conectorDB.php");

class Content_to_city
{
	private $content_to_city;
	
	public function insert_content_city($city_id, $coll_categories_category , $coll_categories_subcategory){
        $registrar = false; //creamos una variable de control
		$consulta = " INSERT INTO content_to_city (city_id, coll_categories_category , coll_categories_subcategory) VALUES (:city_id, :coll_categories_category , :coll_categories_subcategory)";
				
		//VALORES PARA REGISTRO
		$valores = array("city_id"=>$city_id,
						"coll_categories_category"=>$coll_categories_category,
						"coll_categories_subcategory"=>$coll_categories_subcategory
						);
		
		$oConexion = new conectorDB; //instanciamos conector
		$registrar = $oConexion->consultarBD($consulta, $valores);
		
		if($registrar !== false){
			return true;
		}
		else{
			return false;
		}
    } //Termina funcion insert_content_city()

    public function get_content_to_city()
    {


    	$consulta = " SELECT  * FROM content_to_city";
		$valores = null;
		
		$oConectar = new conectorDB; //instanciamos conector
		$this->content_to_city = $oConectar->consultarBD($consulta,$valores);
        
		return $this->content_to_city;
    } // end get all 


    public function get_by_city($city)
    {

    	$consulta = " SELECT * FROM  content_to_city WHERE content_to_city.city_id = $city ";
		$valores = null;
		
		$oConectar = new conectorDB; //instanciamos conector
		$this->content_to_city = $oConectar->consultarBD($consulta,$valores);
        
		return $this->content_to_city;
    } //end get by city

    public function get_by_category($category)
    {
    	// $category = int $category;
    	$consulta = " SELECT * FROM content_to_city WHERE content_to_city.id = $category ";
		$valores = null;
		
		$oConectar = new conectorDB; //instanciamos conector
		$this->content_to_city = $oConectar->consultarBD($consulta,$valores);
        
		return $this->content_to_city;

    } // get by city

    


}///  end class


?>