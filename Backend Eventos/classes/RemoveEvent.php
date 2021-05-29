<?php

require_once("conectorDB.php");
require_once("Events.php");
require_once("Events_Info.php");
require_once("Events_schedules.php");
require_once("Events_Prices.php");
require_once("Events_Packs.php");
require_once("Events_Photo.php");
require_once("Events_schedules_data.php");
require_once("Events_to_Topics.php");

$id = $_POST['id'];
//event info
$event_info = new Events_Info;
$language = $event_info->get_language($id);
if(count($language)>0)
{

	$language = $language[0]['language_id'];
	$result_event_info = $event_info->remove_event_info($id,$language);

}


$event_pack =  new Events_Packs;
$result_event_pack = $event_pack->remove_event_pack($id);
$event_photo = new Events_Photo;
$result_event_photo = $event_photo->remove_event_photo($id);
$event_prices = new Events_Prices;
$result_event_prices = $event_prices->remove_event_prices($id);
$events_schedule =  new Events_schedules;
//$id_event_schedule = $events_schedule->get_by_id($id);
//$id_event_schedule = $id_event_schedule[0]['id'];
$event_schedule_data = new Events_schedules_data;
$result_event_schedule_data = $event_schedule_data->remove_schedule_data($id);
$events_schedule->remove_schedule_data($id);
$event_to_topic = new Events_to_Topics;
$result_event_to_topic = $event_to_topic->remove_event_to_topics($id);
$event =  new Events;
$event->remove_event($id);

echo "Eliminado sastifactoriamente";


?>