<?php


$user = "@albert";

?>
 
 
 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bitday :: Events area</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">    
    <link rel="icon" href="favicon.png" sizes="96x96">
    <link href="./web/css/bootstrap.min.css" rel="stylesheet">
    <link href="./web/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="./web/css/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="./web/css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">


    
    <!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet"> -->
    <link href="./web/css/font-awesome.min.css" rel="stylesheet">
    
    <link href="./web/css/base-admin-3.css" rel="stylesheet">
    <link href="./web/css/base-admin-3-responsive.css" rel="stylesheet">

    <link href="./web/css/custom.css" rel="stylesheet">
	

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>

  <body>

    <?php 
    include("./header.php");

        
    ?>


    <div class="main event-area">
      <div class="container">
        <div class="row">

          <div class="col-md-12">

            
                
              
<div class="row">
 <a href="" data-toggle="modal" data-target="#myModal" class="btn btn-primary  " role="button"  ><span class="glyphicon glyphicon-plus-sign"></span> Add Events </a>
 <div class="btn-group">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">City <span class="caret"></span></button>
        <ul class="dropdown-menu" role="menu">
        <?php
                    
              foreach ($cities as $fila) {

               echo  "<li><a href=".$fila['id'].">".$fila['city']."</a></li>" ;

              }
          ?>
        </ul>
      </div><!-- /btn-group -->

          <div id="table_city">
              

          </div>
    <input type="hidden" name="id_event" id="id_event" >
    <div class="panel panel-primary filterable" id="table_all">
            <div class="panel-heading">
                <h3 class="panel-title">Events</h3>
                <div class="pull-right">
                    <button class="btn btn-primary btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Search</button>
                </div>
            </div>

          
            <table class="table" id="info">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="Event's Name" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Beginning Date" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Ending Date" disabled></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $cont = 1;
                      foreach ($events as $fila) {
                           
                        echo '<tr>';
                        echo '<td>' . $fila['name'] . '</td>';
                        echo '<td>' . $fila['date_beg'] . '</td>';
                        echo '<td>' . $fila['date_end'] . '</td>';                        
                        $cont++;
                        echo "<td><p>"."<a  class='show' href=".$fila['id']."><span class='glyphicon glyphicon-file'></span></a></p></td>";
                        echo "<td><p>"."<a class='edit' href=".$fila['id']."><span class='glyphicon glyphicon-pencil'></span></a></p></td>";
                        echo "<td><p>"."<a  class='remove' href=".$fila['id']."><span class='glyphicon glyphicon-trash'></span></a></p></td>";
                        
                       
                                            }  


                    ?>
           
                
                </tbody>
            </table>
            
        </div>

              </div>


            </div>
            
            
               
             <div class="col-md-6 offset-6 ">
				
          </div>
           <?php 
   include("./views/show_event.php"); 


        
     ?>

     <div> 
	 
	 <?php 
   include("./views/add_event.php"); 


        
     ?>


	 </div>
          
     <?php 
   include("./views/edit_event.php"); 


        
     ?>

     <div>
       
      _<?php
      include("./views/show_event.php"); 

      ?>

     </div>

      
    </div>
  <div>
    

   <?php 
   include("./views/delete_event.php"); 


        
     ?>

  </div>

  

 
   
    <script src="./web/js/libs/jquery-1.9.1.min.js"></script>	  
    <script src="./web/js/libs/bootstrap.min.js"></script>  
    <script src="./web/js/libs/jquery-ui-1.10.3.custom.min.js"></script>    
    <script src="./web/js/libs/bootstrap-timepicker.js"></script>     
    <script src="./web/js/tinymce/tinymce.min.js"></script>
    <script src="./web/js/custom/table.js"></script>
	<script src="./web/js/custom/submit_data_event.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
	<script src="./web/js/custom/map.js"></script>
  <script src="./web/js/custom/map_edit.js"></script>
    <script src="./web/js/custom/schedule_edit.js"></script>
    <script src="./web/js/custom/schedule.js"></script>
    <script src="./web/js/custom/select.js"></script> 
    <script src="./web/js/custom/select_language.js"></script>   
    <script src="./web/js/custom/category.js"></script> 
    <script src="./web/js/custom/edit_delete.js"></script>
    <script src="./web/js/custom/submit_remove.js"></script>
    <script src="./web/js/custom/edit_category.js"></script>
    <script src="./web/js/custom/upload.js"></script>
    <script src="./web/js/custom/upload_edit.js"></script>
    <script src="./web/js/custom/edit_select.js"></script>
    <script src="./web/js/custom/submit_edit_event.js"></script>      
    <script src="./web/js/custom/ready_table.js"></script>
    <script src="./web/js/custom/ready_table_pack.js"></script>
    <script src="./web/js/custom/ready_table_monday.js"></script>
    <script src="./web/js/custom/ready_table_tuesday.js"></script>
    <script src="./web/js/custom/ready_table_weds.js"></script>
    <script src="./web/js/custom/ready_table_thurday.js"></script>
    <script src="./web/js/custom/ready_table_friday.js"></script>
    <script src="./web/js/custom/ready_table_saturday.js"></script>
    <script src="./web/js/custom/ready_table_sunday.js"></script>
    <script src="./web/js/custom/ready_table_edit.js"></script>
    <script src="./web/js/custom/ready_table_pack_edit.js"></script>
    <script src="./web/js/custom/ready_table_monday_edit.js"></script>
    <script src="./web/js/custom/ready_table_tuesday_edit.js"></script>
    <script src="./web/js/custom/ready_table_weds_edit.js"></script>
    <script src="./web/js/custom/ready_table_thurday_edit.js"></script>
    <script src="./web/js/custom/ready_table_friday_edit.js"></script>
    <script src="./web/js/custom/ready_table_saturday_edit.js"></script>
    <script src="./web/js/custom/ready_table_sunday_edit.js"></script>
    <script src="./web/js/custom/select_city.js"></script>
     
	
    <script language="javascript">



    function add_row()
{

  var rowCount = $('#prices_age tr').length;
  rowCount = rowCount - 1;
  var name_max = 'max'+rowCount;
  var name_min = 'min'+rowCount;
  var name_price = 'price'+rowCount;
  var input_min = "<td>"+ "<input type='text' " +  "id="+name_min + " " + "name="+ name_min + " size='12'> " + "</td>"
  var input_max = "<td>"+ "<input type='text' " + "id="+name_max + " " + "name="+ name_max + " size='12'> " + "</td>"
  var input_price = "<td>"+ "<input type='text' " + "id="+name_price + " " + "name="+ name_price + " size='12'> " + "</td>"
  
  var row =  "<tr>" + input_min + input_max + input_price
                    +
                    "<td>"+ "<button type='button' id = 'listo_price_age' class='btn btn-xs btn-primary'>Done</button> "
                    + "<button type='button' id = 'eliminar_price_age' class='btn btn-xs btn-danger'>delete</button>"
                    + '</td>' + '</tr>'
  $('#prices_age tr:last').before(row); 

}



    function edit_add_row()
{

  var rowCount = $('#edit_prices_age tr').length;
  rowCount = rowCount - 1;
  var name_max = 'edit_max'+rowCount;
  var name_min = 'edit_min'+rowCount;
  var name_price = 'edit_price'+rowCount;
  var input_min = "<td>"+ "<input type='text' " +  "id="+name_min + " " + "name="+ name_min + " size='12'> " + "</td>"
  var input_max = "<td>"+ "<input type='text' " + "id="+name_max + " " + "name="+ name_max + " size='12'> " + "</td>"
  var input_price = "<td>"+ "<input type='text' " +  "id="+name_price + " " + "name="+ name_price + " size='12'> " + "</td>"
  
  var row =  "<tr>" + input_min + input_max + input_price
                    +
                    "<td>"+ "<button type='button' id = 'editar_listo_price_age' class='btn btn-xs btn-primary'>Done</button> "
                    + "<button type='button' id='editar_eliminar_price_age' class='btn btn-xs btn-danger'>delete</button>"
                    + '</td>' + '</tr>'
  $('#edit_prices_age tr:last').before(row);  

}



function add_picture()
{


  var rowCount = $('#table_img tr').length;
  rowCount = rowCount - 1;
  var name_pack = 'caption'+rowCount;
  var name_special = 'copyright'+rowCount;
  var name_cover = 'cover' + rowCount;
  var input_pack = "<td>"+ "<input type='text' " + "id="+ name_pack + " "+ "name="+ name_pack + " size='21'> " + "</td>"
  var input_special = "<td>"+ "<input type='text' " + "id="+ name_special + " "+ "name="+ name_special + " size='21'> " + "</td>"
  var input_cover = "<td>"+ "<input type='checkbox' " + "id="+ name_cover + " "+ "name="+ name_cover + " > " + "</td>"

  var row =  "<tr>" + input_pack + input_special 
                    +
                    "<td>"+ "<button type='button' id = 'listo_img' class='btn btn-xs btn-primary'>Done</button> "
                    + "<button type='button' id = 'eliminar_img' class='btn btn-xs btn-danger'>delete</button>"
                    + '</td>' + '</tr>'
  $('#table_img tr:last').before(row); 
  $("#button_add_img").attr("disabled",true); 
  //document.getElementById("rows_img").value = rowCount;




}



function special_prices()
{


  var rowCount = $('#pack_special tr').length;
  rowCount = rowCount - 1;
  var name_pack = 'pack'+rowCount;
  var name_special = 'special'+rowCount;
  var input_pack = "<td>"+ "<input type='text' " + "id="+ name_pack + " "+ "name="+ name_pack + " size='12'> " + "</td>"
  var input_special = "<td>"+ "<input type='text' " + "id="+ name_special + " "+ "name="+ name_special + " size='12'> " + "</td>"

  var row =  "<tr>" + input_pack + input_special
                    +
                    "<td>"+ "<button type='button' id = 'listo_price_pack' class='btn btn-xs btn-primary'>Done</button> "
                    + "<button type='button' id = 'eliminar_price_pack' class='btn btn-xs btn-danger'>delete</button>"
                    + '</td>' + '</tr>'
  $('#pack_special tr:last').before(row);  
  //document.getElementById("rows_special").value = rowCount;




}

function  add_monday()
{

  var rowCount = $('#table_monday tr').length;
  rowCount = rowCount - 1;
  var name_begin = 'b_monday'+rowCount;
  var name_end = 'e_monday'+rowCount;
  var date_monday = 'date_monday' + rowCount ;
  var input_pack = "<td>"+ "<input type='time' " + "id="+ name_begin + " "+ "name="+ name_begin + " size='12'> " + "</td>";
  var input_special = "<td>"+ "<input type='time' " + "id="+ name_end + " "+ "name="+ name_end + " size='12'> " + "</td>";
  var select  = "" ;
  var select_full_monday = "" ;
  $('#select_monday p').each(function(){
         var content = $(this).text();
        
         if(content != "")
         {

           console.log(content);
          select += "<option value='"+ content+"'>"+ content +"</option>";

         }

        select_full_monday = "<select class='form-control' " + "name=" + date_monday + " id=" + date_monday + " >" + select + " </select>";
         
              
        }); 
 var input_select = "<td>"+  select_full_monday  + "</td>";

  var row =  "<tr>" + input_pack + input_special + input_select
                    +
                    "<td>"+ "<button type='button' id = 'listo_monday' class='btn btn-xs btn-primary'>Done</button> "
                    + "<button type='button' id = 'eliminar_monday' class='btn btn-xs btn-danger'>delete</button>"
                    + '</td>' + '</tr>'
  $('#table_monday tr:last').before(row); 

}

// editar monday

function  add_monday_edit()
{

  var rowCount = $('#table_monday_edit tr').length;
  rowCount = rowCount - 1;
  var name_begin = 'b_monday_edit'+rowCount;
  var name_end = 'e_monday_edit'+rowCount;
  var date_monday_edit = 'date_monday_edit' + rowCount ;
  var input_pack = "<td>"+ "<input type='time' " + "id="+ name_begin + " "+ "name="+ name_begin + " size='12'> " + "</td>";
  var input_special = "<td>"+ "<input type='time' " + "id="+ name_end + " "+ "name="+ name_end + " size='12'> " + "</td>";
  var select  = "" ;
  var select_full_monday_edit = "" ;
  $('#select_monday_edit p').each(function(){
         var content = $(this).text();
        
         if(content != "")
         {

           
          select += "<option value='"+ content+"'>"+ content +"</option>";

         }

        select_full_monday_edit = "<select class='form-control' " + "name=" + date_monday_edit + " id=" + date_monday_edit + " >" + select + " </select>";
         
              
        }); 
 var input_select = "<td>"+  select_full_monday_edit  + "</td>";

  var row =  "<tr>" + input_pack + input_special + input_select
                    +
                    "<td>"+ "<button type='button' id = 'listo_monday_edit' class='btn btn-xs btn-primary'>Done</button> "
                    + "<button type='button' id = 'eliminar_monday_edit' class='btn btn-xs btn-danger'>delete</button>"
                    + '</td>' + '</tr>'
  $('#table_monday_edit tr:last').before(row); 

}

function  add_tuesday()
{

  var rowCount = $('#table_tuesday tr').length;
  rowCount = rowCount - 1;
  var name_begin = 'b_tuesday'+rowCount;
  var name_end = 'e_tuesday'+rowCount;
  var date_tuesday = 'date_tuesday' + rowCount ;
  var input_pack = "<td>"+ "<input type='time' " + "id="+ name_begin + " "+ "name="+ name_begin + " size='12'> " + "</td>"
  var input_special = "<td>"+ "<input type='time' " + "id="+ name_end + " "+ "name="+ name_end + " size='12'> " + "</td>"
  var select  = "" ;
  var select_full_tuesday = "";
  $('#select_tuesday p').each(function(){
         var content = $(this).text();
        
         if(content != "")
         {

           
          select += "<option value='"+ content+"'>"+ content +"</option>";

         }

        select_full_tuesday = "<select class='form-control' " + "name=" + date_tuesday + " id=" + date_tuesday + " >" + select + " </select>";      
              
        }); 
 var input_select = "<td>"+  select_full_tuesday  + "</td>";

  var row =  "<tr>" + input_pack + input_special + input_select 
                    +
                    "<td>"+ "<button type='button' id = 'listo_tuesday' class='btn btn-xs btn-primary'>Done</button> "
                    + "<button type='button' id = 'eliminar_tuesday' class='btn btn-xs btn-danger'>delete</button>"
                    + '</td>' + '</tr>'
  $('#table_tuesday tr:last').before(row); 

}
// edit tuesday

function  add_tuesday_edit()
{

  var rowCount = $('#table_tuesday_edit tr').length;
  rowCount = rowCount - 1;
  var name_begin = 'b_tuesday_edit'+rowCount;
  var name_end = 'e_tuesday_edit'+rowCount;
  var date_tuesday_edit = 'date_tuesday_edit' + rowCount ;
  var input_pack = "<td>"+ "<input type='time' " + "id="+ name_begin + " "+ "name="+ name_begin + " size='12'> " + "</td>"
  var input_special = "<td>"+ "<input type='time' " + "id="+ name_end + " "+ "name="+ name_end + " size='12'> " + "</td>"
  var select  = "" ;
  var select_full_tuesday_edit = "";
  $('#select_tuesday_edit p').each(function(){
         var content = $(this).text();
        
         if(content != "")
         {

           
          select += "<option value='"+ content+"'>"+ content +"</option>";

         }

        select_full_tuesday_edit = "<select class='form-control' " + "name=" + date_tuesday_edit + " id=" + date_tuesday_edit + " >" + select + " </select>";      
              
        }); 
 var input_select = "<td>"+  select_full_tuesday_edit  + "</td>";

  var row =  "<tr>" + input_pack + input_special + input_select 
                    +
                    "<td>"+ "<button type='button' id = 'listo_tuesday_edit' class='btn btn-xs btn-primary'>Done</button> "
                    + "<button type='button' id = 'eliminar_tuesday_edit' class='btn btn-xs btn-danger'>delete</button>"
                    + '</td>' + '</tr>'
  $('#table_tuesday_edit tr:last').before(row); 

}


function  add_weds()
{

  var rowCount = $('#table_weds tr').length;
  rowCount = rowCount - 1;
  var name_begin = 'b_weds'+rowCount;
  var name_end = 'e_weds'+rowCount;
  var date_weds = 'date_weds' + rowCount ;
  var input_pack = "<td>"+ "<input type='time' " + "id="+ name_begin + " "+ "name="+ name_begin + " size='12'> " + "</td>"
  var input_special = "<td>"+ "<input type='time' " + "id="+ name_end + " "+ "name="+ name_end + " size='12'> " + "</td>"
  var select  = "" ;
  var select_full_weds = "";
  $('#select_weds p').each(function(){
         var content = $(this).text();
        
         if(content != "")
         {

           
          select += "<option value='"+ content+"'>"+ content +"</option>";

         }

        select_full_weds = "<select class='form-control' " + "name=" + date_weds + " id=" + date_weds + " >" + select + " </select>";  
         
              
        }); 
 var input_select = "<td>"+  select_full_weds  + "</td>";

  var row =  "<tr>" + input_pack + input_special + input_select
                    +
                    "<td>"+ "<button type='button' id = 'listo_weds' class='btn btn-xs btn-primary'>Done</button> "
                    + "<button type='button' id = 'eliminar_weds' class='btn btn-xs btn-danger'>delete</button>"
                    + '</td>' + '</tr>'
  $('#table_weds tr:last').before(row); 

}
//edit weds


function  add_weds_edit()
{

  var rowCount = $('#table_weds_edit tr').length;
  rowCount = rowCount - 1;
  var name_begin = 'b_weds_edit'+rowCount;
  var name_end = 'e_weds_edit'+rowCount;
  var date_weds_edit = 'date_weds_edit' + rowCount ;
  var input_pack = "<td>"+ "<input type='time' " + "id="+ name_begin + " "+ "name="+ name_begin + " size='12'> " + "</td>"
  var input_special = "<td>"+ "<input type='time' " + "id="+ name_end + " "+ "name="+ name_end + " size='12'> " + "</td>"
  var select  = "" ;
  var select_full_weds_edit = "";
  $('#select_weds_edit p').each(function(){
         var content = $(this).text();
        
         if(content != "")
         {

           
          select += "<option value='"+ content+"'>"+ content +"</option>";

         }

        select_full_weds_edit = "<select class='form-control' " + "name=" + date_weds_edit + " id=" + date_weds_edit + " >" + select + " </select>";  
         
              
        }); 
 var input_select = "<td>"+  select_full_weds_edit  + "</td>";

  var row =  "<tr>" + input_pack + input_special + input_select
                    +
                    "<td>"+ "<button type='button' id = 'listo_weds_edit' class='btn btn-xs btn-primary'>Done</button> "
                    + "<button type='button' id = 'eliminar_weds_edit' class='btn btn-xs btn-danger'>delete</button>"
                    + '</td>' + '</tr>'
  $('#table_weds_edit tr:last').before(row); 

}

function  add_thurday()
{

  var rowCount = $('#table_thurday tr').length;
  rowCount = rowCount - 1;
  var name_begin = 'b_thurday'+rowCount;
  var name_end = 'e_thurday'+rowCount;
  var date_thurday = 'date_thurday' + rowCount ;
  var input_pack = "<td>"+ "<input type='time' " + "id="+ name_begin + " "+ "name="+ name_begin + " size='12'> " + "</td>"
  var input_special = "<td>"+ "<input type='time' " + "id="+ name_end + " "+ "name="+ name_end + " size='12'> " + "</td>"
  var select  = "" ;
  var select_full_thurday = "";
  $('#select_thurday p').each(function(){
         var content = $(this).text();
        
         if(content != "")
         {

           
          select += "<option value='"+ content+"'>"+ content +"</option>";

         }

         select_full_thurday = "<select class='form-control' " + "name=" + date_thurday + " id=" + date_thurday + " >" + select + " </select>";
         
              
        }); 
 var input_select = "<td>"+  select_full_thurday  + "</td>";

  var row =  "<tr>" + input_pack + input_special + input_select
                    +
                    "<td>"+ "<button type='button' id = 'listo_thurday' class='btn btn-xs btn-primary'>Done</button> "
                    + "<button type='button' id = 'eliminar_thurday' class='btn btn-xs btn-danger'>delete</button>"
                    + '</td>' + '</tr>'
  $('#table_thurday tr:last').before(row); 

}

// edit thurday

function  add_thurday_edit()
{

  var rowCount = $('#table_thurday_edit tr').length;
  rowCount = rowCount - 1;
  var name_begin = 'b_thurday_edit'+rowCount;
  var name_end = 'e_thurday_edit'+rowCount;
  var date_thurday_edit = 'date_thurday_edit' + rowCount ;
  var input_pack = "<td>"+ "<input type='time' " + "id="+ name_begin + " "+ "name="+ name_begin + " size='12'> " + "</td>"
  var input_special = "<td>"+ "<input type='time' " + "id="+ name_end + " "+ "name="+ name_end + " size='12'> " + "</td>"
  var select  = "" ;
  var select_full_thurday_edit = "";
  $('#select_thurday_edit p').each(function(){
         var content = $(this).text();
        
         if(content != "")
         {

           
          select += "<option value='"+ content+"'>"+ content +"</option>";

         }

         select_full_thurday_edit = "<select class='form-control' " + "name=" + date_thurday_edit + " id=" + date_thurday_edit + " >" + select + " </select>";
         
              
        }); 
 var input_select = "<td>"+  select_full_thurday_edit  + "</td>";

  var row =  "<tr>" + input_pack + input_special + input_select
                    +
                    "<td>"+ "<button type='button' id = 'listo_thurday_edit' class='btn btn-xs btn-primary'>Done</button> "
                    + "<button type='button' id = 'eliminar_thurday_edit' class='btn btn-xs btn-danger'>delete</button>"
                    + '</td>' + '</tr>'
  $('#table_thurday_edit tr:last').before(row); 

}


function  add_friday()
{

  var rowCount = $('#table_friday tr').length;
  rowCount = rowCount - 1;
  var name_begin = 'b_friday'+rowCount;
  var name_end = 'e_friday'+rowCount;
  var date_friday = 'date_friday' + rowCount ;
  var input_pack = "<td>"+ "<input type='time' " + "id="+ name_begin + " "+ "name="+ name_begin + " size='12'> " + "</td>"
  var input_special = "<td>"+ "<input type='time' " + "id="+ name_end + " "+ "name="+ name_end + " size='12'> " + "</td>"

  var select  = "" ;
  var select_full_friday = "";
  $('#select_friday p').each(function(){
         var content = $(this).text();
        
         if(content != "")
         {

           
          select += "<option value='"+ content+"'>"+ content +"</option>";

         }

        select_full_friday = "<select class='form-control' " + "name=" + date_friday + " id=" + date_friday + " >" + select + " </select>";
         
              
        }); 
 var input_select = "<td>"+  select_full_friday  + "</td>";

  var row =  "<tr>" + input_pack + input_special + input_select
                    +
                    "<td>"+ "<button type='button' id = 'listo_friday' class='btn btn-xs btn-primary'>Done</button> "
                    + "<button type='button' id = 'eliminar_friday' class='btn btn-xs btn-danger'>delete</button>"
                    + '</td>' + '</tr>'
  $('#table_friday tr:last').before(row); 

}
//edit friday


function  add_friday_edit()
{

  var rowCount = $('#table_friday_edit tr').length;
  rowCount = rowCount - 1;
  var name_begin = 'b_friday_edit'+rowCount;
  var name_end = 'e_friday_edit'+rowCount;
  var date_friday_edit = 'date_friday_edit' + rowCount ;
  var input_pack = "<td>"+ "<input type='time' " + "id="+ name_begin + " "+ "name="+ name_begin + " size='12'> " + "</td>"
  var input_special = "<td>"+ "<input type='time' " + "id="+ name_end + " "+ "name="+ name_end + " size='12'> " + "</td>"

  var select  = "" ;
  var select_full_friday_edit = "";
  $('#select_friday_edit p').each(function(){
         var content = $(this).text();
        
         if(content != "")
         {

           
          select += "<option value='"+ content+"'>"+ content +"</option>";

         }

        select_full_friday_edit = "<select class='form-control' " + "name=" + date_friday_edit + " id=" + date_friday_edit + " >" + select + " </select>";
         
              
        }); 
 var input_select = "<td>"+  select_full_friday_edit  + "</td>";

  var row =  "<tr>" + input_pack + input_special + input_select
                    +
                    "<td>"+ "<button type='button' id = 'listo_friday_edit' class='btn btn-xs btn-primary'>Done</button> "
                    + "<button type='button' id = 'eliminar_friday_edit' class='btn btn-xs btn-danger'>delete</button>"
                    + '</td>' + '</tr>'
  $('#table_friday_edit tr:last').before(row); 

}


function  add_saturday()
{

  var rowCount = $('#table_saturday tr').length;
  rowCount = rowCount - 1;
  var name_begin = 'b_saturday'+rowCount;
  var name_end = 'e_saturday'+rowCount;
  var date_saturday = 'date_saturday' + rowCount ;
  var input_pack = "<td>"+ "<input type='time' " + "id="+ name_begin + " "+ "name="+ name_begin + " size='12'> " + "</td>"
  var input_special = "<td>"+ "<input type='time' " + "id="+ name_end + " "+ "name="+ name_end + " size='12'> " + "</td>"
  var select  = "" ;
  var select_full_saturday = "";
  $('#select_saturday p').each(function(){
         var content = $(this).text();
        
         if(content != "")
         {

           
          select += "<option value='"+ content+"'>"+ content +"</option>";

         }

        select_full_saturday = "<select class='form-control' " + "name=" + date_saturday + " id=" + date_saturday + " >" + select + " </select>";
         
              
        }); 
 var input_select = "<td>"+  select_full_saturday  + "</td>";
  var row =  "<tr>" + input_pack + input_special + input_select
                    +
                    "<td>"+ "<button type='button' id = 'listo_saturday' class='btn btn-xs btn-primary'>Done</button> "
                    + "<button type='button' id = 'eliminar_saturday' class='btn btn-xs btn-danger'>delete</button>"
                    + '</td>' + '</tr>'
  $('#table_saturday tr:last').before(row); 

}

// edit saturday


function  add_saturday_edit()
{

  var rowCount = $('#table_saturday_edit tr').length;
  rowCount = rowCount - 1;
  var name_begin = 'b_saturday_edit'+rowCount;
  var name_end = 'e_saturday_edit'+rowCount;
  var date_saturday_edit = 'date_saturday_edit' + rowCount ;
  var input_pack = "<td>"+ "<input type='time' " + "id="+ name_begin + " "+ "name="+ name_begin + " size='12'> " + "</td>"
  var input_special = "<td>"+ "<input type='time' " + "id="+ name_end + " "+ "name="+ name_end + " size='12'> " + "</td>"
  var select  = "" ;
  var select_full_saturday_edit = "";
  $('#select_saturday_edit p').each(function(){
         var content = $(this).text();
        
         if(content != "")
         {

           
          select += "<option value='"+ content+"'>"+ content +"</option>";

         }

        select_full_saturday_edit = "<select class='form-control' " + "name=" + date_saturday_edit + " id=" + date_saturday_edit + " >" + select + " </select>";
         
              
        }); 
 var input_select = "<td>"+  select_full_saturday_edit  + "</td>";
  var row =  "<tr>" + input_pack + input_special + input_select
                    +
                    "<td>"+ "<button type='button' id = 'listo_saturday_edit' class='btn btn-xs btn-primary'>Done</button> "
                    + "<button type='button' id = 'eliminar_saturday_edit' class='btn btn-xs btn-danger'>delete</button>"
                    + '</td>' + '</tr>'
  $('#table_saturday_edit tr:last').before(row); 

}


function  add_sunday()
{

  var rowCount = $('#table_sunday tr').length;
  rowCount = rowCount - 1;
  var name_begin = 'b_sunday'+rowCount;
  var name_end = 'e_sunday'+rowCount;
  var date_sunday = 'date_sunday' + rowCount ;
  var input_pack = "<td>"+ "<input type='time' " + "id="+ name_begin + " "+ "name="+ name_begin + " size='12'> " + "</td>"
  var input_special = "<td>"+ "<input type='time' " + "id="+ name_end + " "+ "name="+ name_end + " size='12'> " + "</td>"
  var select  = "" ;
  var select_full_sunday = "";
  $('#select_sunday p').each(function(){
         var content = $(this).text();
        
         if(content != "")
         {

           
          select += "<option value='"+ content+"'>"+ content +"</option>";

         }

        select_full_sunday = "<select class='form-control' " + "name=" + date_sunday + " id=" + date_sunday + " >" + select + " </select>";
         
              
        }); 
  var input_select = "<td>"+  select_full_sunday  + "</td>";
  var row =  "<tr>" + input_pack + input_special + input_select 
                    +
                    "<td>"+ "<button type='button' id = 'listo_sunday' class='btn btn-xs btn-primary'>Done</button> "
                    + "<button type='button' id = 'eliminar_sunday' class='btn btn-xs btn-danger'>delete</button>"
                    + '</td>' + '</tr>'
  $('#table_sunday tr:last').before(row); 

}

//edit sunday 


function  add_sunday_edit()
{

  var rowCount = $('#table_sunday_edit tr').length;
  rowCount = rowCount - 1;
  var name_begin = 'b_sunday_edit'+rowCount;
  var name_end = 'e_sunday_edit'+rowCount;
  var date_sunday_edit = 'date_sunday_edit' + rowCount ;
  var input_pack = "<td>"+ "<input type='time' " + "id="+ name_begin + " "+ "name="+ name_begin + " size='12'> " + "</td>"
  var input_special = "<td>"+ "<input type='time' " + "id="+ name_end + " "+ "name="+ name_end + " size='12'> " + "</td>"
  var select  = "" ;
  var select_full_sunday_edit = "";
  $('#select_sunday_edit p').each(function(){
         var content = $(this).text();
        
         if(content != "")
         {

           
          select += "<option value='"+ content+"'>"+ content +"</option>";

         }

        select_full_sunday_edit = "<select class='form-control' " + "name=" + date_sunday_edit + " id=" + date_sunday_edit + " >" + select + " </select>";
         
              
        }); 
  var input_select = "<td>"+  select_full_sunday_edit  + "</td>";
  var row =  "<tr>" + input_pack + input_special + input_select 
                    +
                    "<td>"+ "<button type='button' id = 'listo_sunday_edit' class='btn btn-xs btn-primary'>Done</button> "
                    + "<button type='button' id = 'eliminar_sunday_edit' class='btn btn-xs btn-danger'>delete</button>"
                    + '</td>' + '</tr>'
  $('#table_sunday_edit tr:last').before(row); 

}

function edit_special_prices()
{


  var rowCount = $('#edit_pack_special tr').length;
  rowCount = rowCount - 1;
  var name_pack = 'edit_pack'+rowCount;
  var name_special = 'edit_special'+rowCount;
  var input_pack = "<td>"+ "<input type='text' " +  "id="+ name_pack + " " + "name="+ name_pack + " size='12'> " + "</td>"
  var input_special = "<td>"+ "<input type='text' " + "id="+ name_special + " " + "name="+ name_special + " size='12'> " + "</td>"

  var row =  "<tr>" + input_pack + input_special
                    +
                    "<td>"+ "<button type='button' id='listo_price_pack_editar' class='btn btn-xs btn-primary'>Done</button> "
                    + "<button type='button' id='editar_eliminar_price_pack' class='btn btn-xs btn-danger'>delete</button>"
                    + '</td>' + '</tr>'
  $('#edit_pack_special tr:last').before(row);

}


         $().ready(function(){

          //count charater brief_description

          $('#characterLeft').text('200 characters left');
          $('#brief_description').keyup(function () {
          var max = 200;
          var len = $(this).val().length;
          if (len >= max) {
              $('#characterLeft').text(' you have reached the limit');
          } else {
              var ch = max - len;
              $('#characterLeft').text(ch + ' characters left');
          }
      });
         


			$( "#datepicker1" ).datepicker({ dateFormat: "yy-mm-dd" });
      $( "#datepicker2" ).datepicker({ dateFormat: "yy-mm-dd" });
      $( "#edit_datepicker1").datepicker({ dateFormat: "yy-mm-dd" });
      $( "#edit_datepicker2" ).datepicker({ dateFormat: "yy-mm-dd" });  



			$("#unique_prices").hide();
      $("#errors").hide();
      $("#errors_edit").hide();
      $("#dir_alternative").hide();
      //$("#edit_dir_alternative").hide();



           $('#unique').on('change', function() { 

             if (this.checked) 
             {

                 //$('#unique_prices').fadeOut();  
                 $('#unique_prices').fadeIn();
                 $("#by_age").fadeOut();
     
           
          }
          else{
    
                //$('#unique_prices').fadeIn();
                $('#unique_prices').fadeOut(); 
                $("#by_age").fadeIn();

              }

           });
           // edit checkbox price unique

            $('#edit_unique').on('change', function() { 

             if (this.checked) 
             {

                 //$('#unique_prices').fadeOut();  
                 $('#edit_unique_prices').fadeIn();
                 $("#edit_by_age").fadeOut();
     
           
          }
          else{
    
                //$('#unique_prices').fadeIn();
                $('#edit_unique_prices').fadeOut(); 
                $("#edit_by_age").fadeIn();
                //$("#edit_price_unique").val(0);

              }

           });

    });
    
            document.addEventListener('DOMContentLoaded', function(){
        //Set header section icon as active
        document.getElementById("events-area").classList.add("active");
      });

      function postJSON(url, data, callback) {
        var request = new XMLHttpRequest();
        request.open("POST", url, true);
        request.onreadystatechange = function() {
          if (request.readyState === 4 && callback)
            callback(request);
        };
        request.send(data);
      } 

     

    </script>
  </body>
</html>

