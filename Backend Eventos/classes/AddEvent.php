<?php

require_once("./conectorDB.php");
require_once("./Events.php");
require_once("./Events_Info.php");
require_once("./Control.php");
require_once("./Events_schedules.php");
require_once("./Events_Prices.php");
require_once("./Events_Packs.php");
require_once("./Events_Photo.php");
require_once("./Events_schedules_data.php");
require_once("./Events_Topics.php");




function bisciesto($year){

if (($year % 4 == 0) && !($year % 100 == 0 && $year % 400 != 0)){
  

	return true;
}
else

	return false;
}



function next_date($date)
{

	$dates = explode('-', $date);
	$year = $dates[0];
	$month = $dates[1];
	$day = $dates[2];

	if ($day == 31) {


      if ($month == 12 ) {  
          $year++; 
          $month = 1 ;
          $day = 1 ;
        } 
        else {

          $month++;
          $day = 1;
        }

   }

   else if ($month == 2) {


      if ( $day == 28 && bisciesto()) {
        
            $day = 29;
          }
      if ($day == 29 && $month==2) {

          $day = 1;
          $month = 3;

      }
        
   }
   
  else
    if ($day == 30) {


      if($month % 2==1)
      {

        $day = 31;
      }
      else
      {

        $month++;
        $day = 1;

      }

    }

    else
    {

      $day++;
    }


    if ($day > 0 && $day < 10) {

        $day = "0".$day;

    }    

    $result = $year . '-'. $month . '-' . $day;
    
    return $result; 

}

$name_event;
$city;
$Outdoor = false;
$Formal_Dressed = false;
$Kinds_Family = false;
$NigthLife = false;
$b_date;
$e_date;
$parent_event_id = false;
$has_no_collaborator = false;
$has_price_observations = false;
$has_price_unique =  false;
$price_unique = false;
$has_alternative_latlng = false;
$has_contact = false;
$shown = true;
$collaborator_id = $_POST['content_to_city'];
$lat  = null ;
$lng  = null ;
$valor;


//$rowscount  = $_POST['rows_ages'];
//die($rowscount);
if(isset($_POST['unique']))
{

	$price_unique = $_POST['price_unique'];
	$has_price_unique = true;


}
if (isset($_POST['Outdoor'])) {

    $Outdoor =  true;
}

if (isset($_POST['Formal_Dressed'])) {

    $Formal_Dressed =  true;
}


if (isset($_POST['Kinds_Family'])) {

    $Kinds_Family =  true;
}


if (isset($_POST['NigthLife'])) {

    $NigthLife =  true;
}


if (isset($_POST['lat']) && isset($_POST['lng'])) {

    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
}




if (isset($_POST['name_event']) && isset($_POST['city']) && isset($_POST['b_date']) && isset($_POST['e_date']) )
{
	$name_event = strip_tags($_POST['name_event']);
	$city = strip_tags($_POST['city']);
	$b_date = strip_tags($_POST['b_date']);
	$e_date = strip_tags($_POST['e_date']);
 	

}

 $event = new Events;
 $result = $event->registrarevents($city,$b_date,$e_date,$Outdoor,$Formal_Dressed,$Kinds_Family,$NigthLife,
 $parent_event_id,$has_no_collaborator,$collaborator_id,$shown,$has_contact,$has_price_observations,$has_price_unique,$price_unique, $has_alternative_latlng,$lat,$lng);

 
 // insert event_info
 $last_id = $event->get_last_id();

 $events_id =  $last_id[0]['last_id'];
 $language ;
 $brief_description = $_POST['brief_description'];
 $description = $_POST['description'];
 $price_obervations = $_POST['price_obervations'];
 $location =  null;
 $contact = null;

 if(isset($_POST['language']))
 {

 	$language = $_POST['language'];
 } 
 $event_info =  new Events_Info;
 $result_event_info = $event_info->insert_event_info($events_id, $language ,$name_event, $brief_description, $location, $description, $contact, $price_obervations);
 
// events_schedules
 $calendario = new Events_schedules;
 $last_id = $event->get_last_id();
 $last_id = $last_id[0]['last_id'];
 $notes = $_POST['notes'];
 $result_events_schedule = $calendario->insert_events_schedules($last_id,$b_date,$e_date,$shown,$notes);

 //  events_schedules_data

 $last_id_calendario = $calendario->get_last_id();
 $last_id_calendario = $last_id_calendario[0]['last_id'];

 // monday

  if(isset($_POST['rows_monday']))
  {
      $count_monday = $_POST['rows_monday'];
      if ($count_monday > 0) {
        # code...

        for ($i=1; $i <= $count_monday ; $i++) { 
          # code...
            $time_beg = "b_monday".$i;
            $time_beg = $_POST[$time_beg];
            $time_end = "e_monday".$i;
            $time_end = $_POST[$time_end];
            $end_date = "date_monday".$i;
            $end_date = $_POST[$end_date];

            $begin_date = date_create($b_date);
            $end_date = date_create($end_date);
            $cont_day = 1;

            while ($begin_date != $end_date) {

              
              # code...
              date_add($begin_date, date_interval_create_from_date_string('1 days'));
              $cont_day++;
            } 


              // insert data 
            $calendario_data = new Events_schedules_data;
            $calendario_data->insert_events_schedules_data($last_id_calendario,$cont_day,$time_beg,$time_end);

 
          }
      }

  }

  // schedule data tuesday


   if(isset($_POST['rows_tuesday']))
  {
      $count_tuesday = $_POST['rows_tuesday'];
      if ($count_tuesday > 0) {
        # code...

        for ($i=1; $i <= $count_tuesday ; $i++) { 
          # code...
            $time_beg = "b_tuesday".$i;
            $time_beg = $_POST[$time_beg];
            $time_end = "e_tuesday".$i;
            $time_end = $_POST[$time_end];
            $end_date = "date_tuesday".$i;
            $end_date = $_POST[$end_date];

            $begin_date = date_create($b_date);
            $end_date = date_create($end_date);
            $cont_day = 1;

            while ($begin_date != $end_date) {

              
              # code...
              date_add($begin_date, date_interval_create_from_date_string('1 days'));
              $cont_day++;
            } 


              // insert data 
            $calendario_data = new Events_schedules_data;
            $calendario_data->insert_events_schedules_data($last_id_calendario,$cont_day,$time_beg,$time_end);

 
          }
      }

  }

  //  schedule data weds

  if(isset($_POST['rows_weds']))
  {
      $count_weds = $_POST['rows_weds'];
      if ($count_weds > 0) {
        # code...

        for ($i=1; $i <= $count_weds ; $i++) { 
          # code...
            $time_beg = "b_weds".$i;
            $time_beg = $_POST[$time_beg];
            $time_end = "e_weds".$i;
            $time_end = $_POST[$time_end];
            $end_date = "date_weds".$i;
            $end_date = $_POST[$end_date];

            $begin_date = date_create($b_date);
            $end_date = date_create($end_date);
            $cont_day = 1;

            while ($begin_date != $end_date) {

              
              # code...
              date_add($begin_date, date_interval_create_from_date_string('1 days'));
              $cont_day++;
            } 


              // insert data 
            $calendario_data = new Events_schedules_data;
            $calendario_data->insert_events_schedules_data($last_id_calendario,$cont_day,$time_beg,$time_end);

 
          }
      }

  }

  //  schedule data thurday

  if(isset($_POST['rows_thurday']))
  {
      $count_thurday = $_POST['rows_thurday'];
      if ($count_thurday > 0) {
        # code...

        for ($i=1; $i <= $count_thurday ; $i++) { 
          # code...
            $time_beg = "b_thurday".$i;
            $time_beg = $_POST[$time_beg];
            $time_end = "e_thurday".$i;
            $time_end = $_POST[$time_end];
            $end_date = "date_thurday".$i;
            $end_date = $_POST[$end_date];

            $begin_date = date_create($b_date);
            $end_date = date_create($end_date);
            $cont_day = 1;

            while ($begin_date != $end_date) {

              
              # code...
              date_add($begin_date, date_interval_create_from_date_string('1 days'));
              $cont_day++;
            } 


              // insert data 
            $calendario_data = new Events_schedules_data;
            $calendario_data->insert_events_schedules_data($last_id_calendario,$cont_day,$time_beg,$time_end);

 
          }
      }

  }
  // schedule data friday

  if(isset($_POST['rows_friday']))
  {
      $count_friday = $_POST['rows_friday'];
      if ($count_friday > 0) {
        # code...

        for ($i=1; $i <= $count_friday ; $i++) { 
          # code...
            $time_beg = "b_friday".$i;
            $time_beg = $_POST[$time_beg];
            $time_end = "e_friday".$i;
            $time_end = $_POST[$time_end];
            $end_date = "date_friday".$i;
            $end_date = $_POST[$end_date];

            $begin_date = date_create($b_date);
            $end_date = date_create($end_date);
            $cont_day = 1;

            while ($begin_date != $end_date) {

              
              # code...
              date_add($begin_date, date_interval_create_from_date_string('1 days'));
              $cont_day++;
            } 


              // insert data 
            $calendario_data = new Events_schedules_data;
            $calendario_data->insert_events_schedules_data($last_id_calendario,$cont_day,$time_beg,$time_end);

 
          }
      }

  }

  // schedule data saturday

  if(isset($_POST['rows_saturday']))
  {
      $count_saturday = $_POST['rows_saturday'];
      if ($count_saturday > 0) {
        # code...

        for ($i=1; $i <= $count_saturday ; $i++) { 
          # code...
            $time_beg = "b_saturday".$i;
            $time_beg = $_POST[$time_beg];
            $time_end = "e_saturday".$i;
            $time_end = $_POST[$time_end];
            $end_date = "date_saturday".$i;
            $end_date = $_POST[$end_date];

            $begin_date = date_create($b_date);
            $end_date = date_create($end_date);
            $cont_day = 1;

            while ($begin_date != $end_date) {

              
              # code...
              date_add($begin_date, date_interval_create_from_date_string('1 days'));
              $cont_day++;
            } 


              // insert data 
            $calendario_data = new Events_schedules_data;
            $calendario_data->insert_events_schedules_data($last_id_calendario,$cont_day,$time_beg,$time_end);

 
          }
      }

  } 

  // schedule data Sunday

  if(isset($_POST['rows_sunday']))
  {
      $count_sunday = $_POST['rows_sunday'];
      if ($count_sunday > 0) {
        # code...

        for ($i=1; $i <= $count_sunday ; $i++) { 
          # code...
            $time_beg = "b_sunday".$i;
            $time_beg = $_POST[$time_beg];
            $time_end = "e_sunday".$i;
            $time_end = $_POST[$time_end];
            $end_date = "date_sunday".$i;
            $end_date = $_POST[$end_date];

            $begin_date = date_create($b_date);
            $end_date = date_create($end_date);
            $cont_day = 1;

            while ($begin_date != $end_date) {

              
              # code...
              date_add($begin_date, date_interval_create_from_date_string('1 days'));
              $cont_day++;
            } 


              // insert data 
            $calendario_data = new Events_schedules_data;
            $calendario_data->insert_events_schedules_data($last_id_calendario,$cont_day,$time_beg,$time_end);

 
          }
      }

  }


 
 //insert prices  

  if($has_price_unique == false)
  {
  $rows_ages = $_POST['rows_ages'];
     if($rows_ages >= 1)
     {
     $event_prices = new Events_Prices;

     for ($i=1; $i <= $rows_ages ; $i++) { 
     	# code...
     	$age_beg = "min".$i;
     	$age_beg = $_POST[$age_beg];
     	$age_end = "max".$i;
     	$age_end = $_POST[$age_end];
     	$price = "price".$i;
     	$price = $_POST[$price];
     	$event_prices->insert_events_prices($last_id, $age_beg , $age_end ,$price);
     }
       }

  }
 // insert special prices
   $rows_special = $_POST['rows_special'];
   
    if ($rows_special >= 1) {
    	# code...


    	$pack_event = new Events_Packs;

  	for ($i=1; $i <= $rows_special ; $i++) { 
  	 	# code...
  	 	$special = "special".$i;    
  	 	$special = $_POST[$special];
  	 	$pack = "pack".$i;
  	 	$pack = $_POST[$pack];
  	 	$pack_event->insert_events_packs($last_id,$special , $pack);
  	   }
   }


//insert event_photo

 $path = "/upload/";
 $cantidad = $_POST['cont_img'];
 $name = "name_img1";
 $cover = true;
 $name_cover = "";


 if ($cantidad > 0) {
   # code...

 $event_photo = new Events_Photo;   
 $name = $_POST[$name];
 if (!is_dir($path))
   {

    mkdir($path);

   }
  list($txt, $ext) = explode(".", $name);
  $name_last = $last_id.".".$ext;
  $path .= $name_last;
  $result_photo = $event_photo->insert_events_photo($last_id, $path , $cover );
      if($result_photo)
    {
       $old = "../tmp/".$name;
       $newname = "../upload/".$name_last; 
       //rename($old, $newname);
       copy ($old, $newname);
       unlink ($old);
      // file_put_contents($newname, $old);

    }

  }
 

 
 // inser event_topic
 $topic = new Events_Topics;
 $topics_id = $_POST['topics'];
 $result_topic =  $topic->insert_events_topic($events_id,$topics_id);

if ($result && $result_event_info) {
	
	 echo "Insertado Satisfactoriamente"; 

	}




?>