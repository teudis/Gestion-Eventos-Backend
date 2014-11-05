<?php

require_once("conectorDB.php");

class Languages
{
	private $languages;
	
	public function get_languages(){
		$consulta = "SELECT * FROM language ";
		$valores = null;
		
		$oConectar = new conectorDB; //instanciamos conector
		$this->city = $oConectar->consultarBD($consulta,$valores);
        
		return $this->city;
	} //Termina funcion languages();
	
	
}/// end class city ///


?>