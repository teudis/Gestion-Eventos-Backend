<?php

require_once("conectorDB.php");

class City
{
	private $city;
	
	public function get_city(){
		$consulta = "SELECT * FROM city ";
		$valores = null;
		
		$oConectar = new conectorDB; //instanciamos conector
		$this->city = $oConectar->consultarBD($consulta,$valores);
        
		return $this->city;
	} //Termina funcion get_city();
	
	
}/// end class city ///


?>