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
require_once("Events_Topics.php");



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
$has_no_collaborator = 0;
$has_price_observations = false;
$has_price_unique =  false;
$price_unique = false;
$has_alternative_latlng = false;
$has_contact = false;
$shown = true;
$collaborator_id = $_POST['edit_content_to_city'];
$lat = null;
$lng = null;
$valor;

$event_id = $_POST['id_event_edit'];

//$rowscount  = $_POST['rows_ages'];
//die($rowscount);
if(isset($_POST['unique']))
{

  $price_unique = $_POST['edit_price_unique'];
  $has_price_unique = true;


}
if (isset($_POST['edit_Outdoor'])) {

    $Outdoor =  true;
}

if (isset($_POST['edit_Formal_Dressed'])) {

    $Formal_Dressed =  true;
}


if (isset($_POST['edit_Kinds_Family'])) {

    $Kinds_Family =  true;
}


if (isset($_POST['edit_NigthLife'])) {

    $NigthLife =  true;
}


if (isset($_POST['edit_lat']) && isset($_POST['edit_lng'])) {

    $lat = $_POST['edit_lat'];
    $lng = $_POST['edit_lng'];
}




	$name_event =  $_POST['edit_name_event'];
	$city    =        $_POST['edit_city'];
	$b_date  =      $_POST['edit_b_date'];
	$e_date  =      $_POST['edit_e_date'];
 	


// Events
 $event = new Events;
 $result = $event->update_event($event_id,$city,$b_date,$e_date,$Outdoor,$Formal_Dressed,$Kinds_Family,$NigthLife,
 	$parent_event_id,$has_no_collaborator,$collaborator_id,$shown,$has_contact,$has_price_observations,$has_price_unique,$price_unique, $has_alternative_latlng,$lat,$lng);
 // Events Info

 $event_info = new Events_Info;
 $language_id = $_POST['edit_language'];
 $brief_description  = $_POST['edit_brief_description'];
 $location =  NUll;
 $description = $_POST['edit_description'];
 $contact = NUll;
 $price_obervations = $_POST['edit_price_obervations'];
 $event_info->update_event_info($event_id, $language_id , $name_event, $brief_description, $location, $description, $contact, $price_obervations);
 // Event Schedule 
 $event_schedule = new Events_schedules;
 $notes = $_POST['edit_notes'];
 $event_schedule->update_event_schedule($event_id,$b_date,$e_date,$shown,$notes);
 // Schedule data

  // get id schedule event
 $id_event_schedule = $event_schedule->get_by_id($event_id);
 $id_event_schedule = $id_event_schedule[0]['id'];

 // search 

 $result_data = $event_schedule->get_schedule_data_id($id_event_schedule);
  $remove = Array();

  for ($i=0; $i < count($result_data) ; $i++) { 
    # code...
     $remove[$i] = $result_data[$i]['id'];
  }

 // schedule data 

 // monday_edit

  if(isset($_POST['rows_monday_edit']))
  {
      $count_monday_edit = $_POST['rows_monday_edit'];
      if ($count_monday_edit > 0) {
        # code...

        $calendario_data = new Events_schedules_data;
        // remove all schdule data
        //$calendario_data->remove_schedule_data($id_event_schedule);
        for ($i=1; $i <= $count_monday_edit ; $i++) { 
          # code...
            $time_beg = "b_monday_edit".$i;
            $time_beg = $_POST[$time_beg];
            $time_end = "e_monday_edit".$i;
            $time_end = $_POST[$time_end];
            $end_date = "date_monday_edit".$i;
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
            $calendario_data->insert_events_schedules_data($id_event_schedule,$cont_day,$time_beg,$time_end);

 
          }
      }

  }
  // tuesday edit


   if(isset($_POST['rows_tuesday_edit']))
  {
      $count_tuesday_edit = $_POST['rows_tuesday_edit'];
      if ($count_tuesday_edit > 0) {
        # code...

        $calendario_data = new Events_schedules_data;
        // remove all schdule data
        //$calendario_data->remove_schedule_data($id_event_schedule);
        for ($i=1; $i <= $count_tuesday_edit ; $i++) { 
          # code...
            $time_beg = "b_tuesday_edit".$i;
            $time_beg = $_POST[$time_beg];
            $time_end = "e_tuesday_edit".$i;
            $time_end = $_POST[$time_end];
            $end_date = "date_tuesday_edit".$i;
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
            $calendario_data->insert_events_schedules_data($id_event_schedule,$cont_day,$time_beg,$time_end);

 
          }
      }

  }

  // edit weds
   if(isset($_POST['rows_weds_edit']))
  {
      $count_weds_edit = $_POST['rows_weds_edit'];
      if ($count_weds_edit > 0) {
        # code...

        $calendario_data = new Events_schedules_data;
        // remove all schdule data
        //$calendario_data->remove_schedule_data($id_event_schedule);
        for ($i=1; $i <= $count_weds_edit ; $i++) { 
          # code...
            $time_beg = "b_weds_edit".$i;
            $time_beg = $_POST[$time_beg];
            $time_end = "e_weds_edit".$i;
            $time_end = $_POST[$time_end];
            $end_date = "date_weds_edit".$i;
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
            $calendario_data->insert_events_schedules_data($id_event_schedule,$cont_day,$time_beg,$time_end);

 
          }
      }

  }

  //edit thurday

   if(isset($_POST['rows_thurday_edit']))
  {
      $count_thurday_edit = $_POST['rows_thurday_edit'];
      if ($count_thurday_edit > 0) {
        # code...

        $calendario_data = new Events_schedules_data;
        // remove all schdule data
        //$calendario_data->remove_schedule_data($id_event_schedule);
        for ($i=1; $i <= $count_thurday_edit ; $i++) { 
          # code...
            $time_beg = "b_thurday_edit".$i;
            $time_beg = $_POST[$time_beg];
            $time_end = "e_thurday_edit".$i;
            $time_end = $_POST[$time_end];
            $end_date = "date_thurday_edit".$i;
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
            $calendario_data->insert_events_schedules_data($id_event_schedule,$cont_day,$time_beg,$time_end);

 
          }
      }

  }

  // friday edit 

   if(isset($_POST['rows_friday_edit']))
  {
      $count_friday_edit = $_POST['rows_friday_edit'];
      if ($count_friday_edit > 0) {
        # code...

        $calendario_data = new Events_schedules_data;
        // remove all schdule data
        //$calendario_data->remove_schedule_data($id_event_schedule);
        for ($i=1; $i <= $count_friday_edit ; $i++) { 
          # code...
            $time_beg = "b_friday_edit".$i;
            $time_beg = $_POST[$time_beg];
            $time_end = "e_friday_edit".$i;
            $time_end = $_POST[$time_end];
            $end_date = "date_friday_edit".$i;
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
            $calendario_data->insert_events_schedules_data($id_event_schedule,$cont_day,$time_beg,$time_end);

 
          }
      }

  }
  // saturday
   if(isset($_POST['rows_saturday_edit']))
  {
      $count_saturday_edit = $_POST['rows_saturday_edit'];
      if ($count_saturday_edit > 0) {
        # code...

        $calendario_data = new Events_schedules_data;
        // remove all schdule data
        //$calendario_data->remove_schedule_data($id_event_schedule);
        for ($i=1; $i <= $count_saturday_edit ; $i++) { 
          # code...
            $time_beg = "b_saturday_edit".$i;
            $time_beg = $_POST[$time_beg];
            $time_end = "e_saturday_edit".$i;
            $time_end = $_POST[$time_end];
            $end_date = "date_saturday_edit".$i;
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
            $calendario_data->insert_events_schedules_data($id_event_schedule,$cont_day,$time_beg,$time_end);

 
          }
      }

  }

  // sunday

   if(isset($_POST['rows_sunday_edit']))
  {
      $count_sunday_edit = $_POST['rows_sunday_edit'];
      if ($count_sunday_edit > 0) {
        # code...

        $calendario_data = new Events_schedules_data;
        // remove all schdule data
        //$calendario_data->remove_schedule_data($id_event_schedule);
        for ($i=1; $i <= $count_sunday_edit ; $i++) { 
          # code...
            $time_beg = "b_sunday_edit".$i;
            $time_beg = $_POST[$time_beg];
            $time_end = "e_sunday_edit".$i;
            $time_end = $_POST[$time_end];
            $end_date = "date_sunday_edit".$i;
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
            $calendario_data->insert_events_schedules_data($id_event_schedule,$cont_day,$time_beg,$time_end);

 
          }
      }

  }

  // eliminar duplicados

  for ($i=0; $i < count($remove) ; $i++) { 
    # code...
     
     $calendario_data = new Events_schedules_data;
     $calendario_data->remove_schedule_data_id($remove[$i]);
  }

 

// event prices 

  if($has_price_unique == false)
  {
    $rows_ages = $_POST['edit_rows_ages'];
    if($rows_ages >= 1)
    {
    $event_prices = new Events_Prices;
    $event_prices->remove_event_prices($event_id);
    for ($i=1; $i <= $rows_ages ; $i++) { 
    # code...
    $age_beg = "edit_min".$i;
    $age_beg = $_POST[$age_beg];
    $age_end = "edit_max".$i;
    $age_end = $_POST[$age_end];
    $price = "edit_price".$i;
    $price = $_POST[$price];
    $event_prices->insert_events_prices($event_id, $age_beg , $age_end ,$price);
    }
     }

 }// end has price unique


   // event pack

    $rows_special = $_POST['edit_rows_special'];
    if ($rows_special >= 1) {
      # code...


      $pack_event = new Events_Packs;
      $pack_event->remove_event_pack($event_id);

  for ($i=1; $i <= $rows_special ; $i++) { 
    # code...
    $special = "edit_special".$i;
    $special = $_POST[$special];
    $pack = "edit_pack".$i;
    $pack = $_POST[$pack];
    $pack_event->insert_events_packs($event_id,$special , $pack);

    }
   }


// Topics update
 $event_topic = new Events_Topics;
 $topics_id = $_POST['edit_topics'];
 $event_topic->update_event_topic($event_id,$topics_id);

 //update images
 //$cont_img = $_POST['edit_cont_img'];

 $path = "/upload/"; 
 $event_photo = new Events_Photo;
 $name = "edit_name_img1";
 $name = $_POST[$name];
 $cover = true;
 $result_photo_id = $event_photo->get_photo_by_id($event_id);
 if(count($result_photo_id) > 0)
 {
 // search element in A
  $path = $path.$name;
  $element_a[$i] = $path;

 // search B in A
    # code...
     $key = in_array($result_photo_id[0]['path'] ,$element_a);
     $path = "/upload/"; 

     if($key == false)
     {
        //die($key);
        $event_photo->remove_event_photo($result_photo_id[0]['events_id']);

        // insert value
              if (!is_dir($path))
         {

          mkdir($path);

         }
          list($txt, $ext) = explode(".", $name);
          $name_last = $event_id.".".$ext;
          $path .= $name_last;
          $result_photo = $event_photo->insert_events_photo($event_id, $path , $cover );
              if($result_photo)
            {
               $old = "../tmp/".$name;
               $newname = "../upload/".$name_last; 
               //rename($old, $newname);
               copy ($old, $newname);
               unlink ($old);
              

            }
        

     }
  
   }
   else
   {


       $event_photo = new Events_Photo; 
         if (!is_dir($path))
           {

            mkdir($path);

           }
          list($txt, $ext) = explode(".", $name);
          $name_last = $event_id.".".$ext;
          $path .= $name_last;
          $result_photo = $event_photo->insert_events_photo($event_id, $path , $cover );
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


 echo "Edit susscefull";



?>