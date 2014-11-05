<?php 

require_once("conectorDB.php");
require_once("Events_Topics.php");

$city = $_POST['id_city'];
//$city = 1;

$topics = new Events_Topics;
$result = $topics->get_event_topics($city);
$salida = "<option value=''>Select Topic </option>";
foreach ($result as $query) {
	# code...
	$salida.= "<option value='".$query['topics_id']."'>".$query['topic']."</option>";

}
 
echo $salida;




?>


