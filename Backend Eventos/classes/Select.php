<?php


require_once("conectorDB.php");
require_once("Content_to_city.php");
$city = $_POST['id_city'];
//$city = 1;

$cities = new Content_to_city;
$result = $cities->get_by_city($city);
$salida = "<option value=''>Select Category </option>";
foreach ($result as $query) {
	# code...
	$salida.= "<option value='".$query['id']."'>".$query['coll_categories_category']."</option>";

}
 
echo $salida;

?>