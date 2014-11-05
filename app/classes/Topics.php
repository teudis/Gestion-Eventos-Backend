<?php 

require_once("conectorDB.php");
require_once("Events_Topics.php");
require_once("Languages.php");

$city = $_POST['id_city'];
//$city = 1;

$topics = new Events_Topics;
$result = $topics->get_event_topics($city);

$language  = new Languages;
$idioma = $language->get_languages_name($city);
if (count($idioma) > 0) {
	# code...
	$idioma = $idioma[0]['name'];
}
else
{

	$idioma = 0;
}


$salida = "";
if($idioma == "spanish")
{
	$salida = "<option value=''>Seleccione Tema </option>";
}
else
{
	$salida = "<option value=''>Select Topic </option>";

}

foreach ($result as $query) {
	# code...
	$salida.= "<option value='".$query['topics_id']."'>".$query['topic']."</option>";

}
 
echo $salida;




?>


