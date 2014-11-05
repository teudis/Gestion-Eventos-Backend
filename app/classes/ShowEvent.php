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
$events = $event->get_event_info($id);
$result['city'] = $events[0]['city'];
$result['name_event'] = $events[0]['name'];
$result['b_date'] = $events[0]['date_beg'];
$result['e_date'] = $events[0]['date_end'];
$result['language_event'] = $events[0]['language'];
$result['brief_description'] = $events[0]['brief_description'];
$result['description_event'] = $events[0]['description'];
echo json_encode($result);

?>