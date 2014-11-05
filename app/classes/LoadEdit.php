<?php

require_once("conectorDB.php");
require_once("Events.php");
require_once("Events_Info.php");
require_once("Control.php");
require_once("Events_schedules.php");
require_once("Events_Prices.php");
require_once("Events_Packs.php");
require_once("Events_Photo.php");
require_once("Events_schedules_data.php");
require_once("Content_to_city.php");
require_once("Events_Topics.php");

$id = $_POST['id'];
$event = new Events;
$events = $event->get_event_by_id($id);
$result['id'] = $events[0]['id'];
$result['city'] = $events[0]['city_id_event'];
$result['collaborator_id'] = $events[0]['collaborator_id'];
$result['b_date'] = $events[0]['date_beg'];
$result['e_date'] = $events[0]['date_end'];
$result['has_price_observations'] = $events[0]['has_price_observations'];
$result['outdoor'] = $events[0]['outdoor'];
$result['well_dressed'] = $events[0]['well_dressed'];
$result['k_f'] = $events[0]['k_f'];
$result['n_l'] = $events[0]['n_l'];
$result ['lat'] = $events[0]['lat'];
$result['lng'] = $events [0]['lng'];
$result['has_price_unique'] = $events[0]['has_price_unique'];
$result['price_unique']= $events[0]['price_unique'];

$event_info = new Events_Info;
$events_info = $event_info->get_event_info_id($id);
$result['language_id'] = $events_info[0]['language_id'];
$result['name_event'] = $events_info[0]['name'];
$result['brief_description'] = $events_info[0]['brief_description'];
$result['edit_description'] = $events_info[0]['description'];
$result['price_obervations'] = $events_info[0]['price_obervations'];

$event_schedule = new Events_schedules;
$result_event_schedule = $event_schedule->get_schedule_data_id($id);
$result_notes = $event_schedule->get_by_id($id);
$result_notes = $result_notes[0]['notes'];
$result['notes'] = $result_notes;
$result['schedule_data'] = $result_event_schedule;
$cant = count($result_event_schedule);
$result['cant'] = $cant;
$category = new Content_to_city;
$result_category = $category->get_by_city($events[0]['city_id_event']); 
$cont_category = count($result_category);
$result['cont_category'] = $cont_category;
$result['category'] = $result_category;
$photo = new Events_Photo;
$result_photo = $photo->get_photo_by_id($id);
$result['photos'] = $result_photo;
$event_price = new Events_Prices;
$result_event_prices = $event_price->get_prices_by_id($id);
if(count($result_event_prices)==0)
{

	$result['prices_cont'] = 0;
}
else
{

	$result['prices_cont'] =  count($result_event_prices);
	$result['prices'] =  $result_event_prices;

}

$event_pack = new Events_Packs;
$result_event_pack = $event_pack->get_pack_by_id($id);

if(count($result_event_pack)==0)
{

	$result['pack_cont'] = 0;
}
else
{

	$result['pack_cont'] =  count($result_event_pack);
	$result['pack'] =  $result_event_pack;

}

$topic = new Events_Topics;
$result_topic =  $topic->get_event_topics($events_info[0]['language_id']);

$result['cont_topic'] =  count($result_topic);
$result['topics'] = $result_topic;
//current topic
$result_current_topic = $topic->get_current_topics($id);
$result_current_topic = $result_current_topic[0]['topics_id'];
$result['current_topic'] = $result_current_topic;

// get photo by event
$event_photo = new Events_Photo;
$dir_photo = $event_photo->get_photo_by_id($id);
$result['photos'] = $dir_photo;
$cont_photo = count($dir_photo);
$result['cont_photo'] = $cont_photo;


echo json_encode($result);

?>