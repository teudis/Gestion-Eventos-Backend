 $(document).ready(function(){


 
 	
 

$("#edit_show_images").on('click','a.remove_image_div',function(event){



		event.preventDefault();
		$(this).parent('p').remove();	
    var cont =  $("#edit_cont_img").val();
    cont = cont - 1;
    $("#edit_cont_img").val(cont);

	}
);

 	$("#info a").click(function(event){
 		//alert("ok");
 		event.preventDefault();

 		 var id  = $(this).attr('href');
 		 var action  = $(this).attr('class');
 		 
 		 //editar
 		 if (action == "edit") {

 		 	$.ajax({
			
			url: "classes/LoadEdit.php", 
			data: {id:id},
			type: "POST",
			async: false,
			dataType: "JSON",
			success: function(msg){

				//var id_edit = msg.id;	
				$("#edit_id_form").val(msg.id);	
				$("#edit_city").val(msg.city);	
				if(msg.outdoor==1)
				{	
					$("#edit_Outdoor").attr('checked',true);
				}	

				if (msg.well_dressed==1) {

					$("#edit_Formal_Dressed").attr('checked',true);
				}

				if(msg.k_f==1)
				{

					$("#edit_Kinds_Family").attr('checked',true);

				}
				if(msg.n_l==1)
				{

					$("#edit_NigthLife").attr('checked',true);

				}

				//dates


				$("#edit_datepicker1").val(msg.b_date);
				$("#edit_datepicker2").val(msg.e_date);
				$("#edit_content_to_city").val(msg.collaborator_id);
				$("#edit_language").val(msg.language_id);
				$("#edit_name_event").val(msg.name_event);
				$("#edit_brief_description").val(msg.brief_description);
				$("#edit_description").val(msg.edit_description);
				$("#edit_price_obervations").val(msg.price_obervations);
        // generate prices by ages

         var count_pack = msg.pack_cont;
         var count_input =  $("#edit_rows_special").val();
         

         if (count_pack != 0 && count_input == 0 ) {


              for (var i = 1; i <= count_pack; i++) {               

              
            var name_pack = 'edit_pack'+ i;
            var name_special = 'edit_special'+ i;
            var value_pack = msg.pack[i-1]['pack'];
            var value_special = msg.pack[i-1]['price'];           

            var row =  "<tr>" + "<td>" + value_pack + "</td>" + "<td>" + value_special + "</td>"
                              +
                              "<td>"+ "<button type='button' id='editar_price_pack_editar' class='btn btn-xs btn-primary'>edit</button> "
                              + "<button type='button' id='editar_eliminar_price_pack' class='btn btn-xs btn-danger'>delete</button>"
                              + '</td>' + '</tr>'
            $('#edit_pack_special tr:last').before(row);
            // input hidden 

             var input_min = "<input type='hidden' " +  "id="+ name_pack + " " + "name="+ name_pack + " "+ "value=" + value_pack + " > ";
             var input_max = "<input type='hidden' " +  "id="+ name_special + " " + "name="+ name_special + " " + "value="+ value_special + " > ";
             $("#edit_prices_pack_hidden").append('<p>' + input_min + input_max  + '</p>');


              }

            $("#edit_rows_special").val(count_pack);


         }


         // generate prices by ages

         var count_prices = msg.prices_cont;
         var count_input =  $("#edit_rows_ages").val();
         

         if (count_prices != 0 && count_input == 0 ) {

            for (var i = 1; i <=  count_prices; i++) {
              
            

            var name_max = 'edit_max'+ i;
            var name_min = 'edit_min'+ i ;
            var name_price = 'edit_price'+ i;
            var value_name_max = msg.prices[i-1]['age_end'];
            var value_name_min = msg.prices[i-1]['age_beg'];
            var value_price = msg.prices[i-1]['price'];                      
            var row =  "<tr>" + "<td>" + value_name_min + "</td>" + "<td>" + value_name_max + "</td>" +  "<td>" + value_price + "</td>" 
                              +
                              "<td>"+ "<button type='button' id = 'editar_listo_price_age' class='btn btn-xs btn-primary'>Done</button> "
                              + "<button type='button' id='editar_eliminar_price_age' class='btn btn-xs btn-danger'>delete</button>"
                              + '</td>' + '</tr>'
            $('#edit_prices_age tr:last').before(row); 
            // input hidenn

            var input_min = "<input type='hidden' " +  "id="+ name_min + " " + "name="+ name_min + " "+ "value=" + value_name_min + " > ";
            var input_max = "<input type='hidden' " +  "id="+ name_max + " " + "name="+ name_max + " " + "value="+ value_name_max + " > ";
            var input_price = "<input type='hidden' " + "id="+ name_price + " " + "name="+ name_price+ " " + "value="+ value_price + " > " ;
            $("#edit_prices_ages_hidden").append('<p>' + input_min + input_max + input_price + '</p>');

            }

            $("#edit_rows_ages").val(count_prices);


         }
         // schedule data show calendar

         var cant_schedule = msg.cant;
         if (cant_schedule >0) {



          for (var i = 0; i < cant_schedule; i++) {


            var begin_date = msg.b_date;
            var id_day = msg.schedule_data[i]['day_id'];
            var cont = 1;
            var end_fecha = msg.b_date;;
            var new_fecha = new Date();
            while(cont != id_day)
            {

              var fechaf = begin_date.split('-');
              var year = fechaf[0];
              var month = fechaf[1];
              var day = fechaf [2];
              new_fecha = new Date(year,month-1,day);
              var sumarDias=parseInt(1);
              new_fecha.setDate(new_fecha.getDate() + sumarDias);
              var year_result = new_fecha.getFullYear();
              var month_result = new_fecha.getMonth()+ 1 ;
              var day_result = new_fecha.getDate();
              var result = year_result + '-'+ month_result + '-'+day_result;

              end_fecha = result;
              begin_date = result;
              cont++;

            }

              // sunday
            if(new_fecha.getDay()==0)
            {

             
              var rowCount = $('#table_sunday_edit tr').length;
              rowCount = rowCount - 1;
              var name_begin = 'b_sunday_edit'+rowCount;
              var name_end = 'e_sunday_edit'+rowCount;
              var date_sunday_edit = 'date_sunday_edit' + rowCount ;
              var input_pack = "<td>"+ msg.schedule_data[i]['time_beg'] + "</td>";
              var input_special = "<td>"+  msg.schedule_data[i]['time_end'] + "</td>";              
             var input_select = "<td>"+  end_fecha  + "</td>";

              var row =  "<tr>" + input_pack + input_special + input_select
                                +
                                "<td>"+ "<button type='button' id = 'listo_sunday_edit' class='btn btn-xs btn-primary'>edit</button> "
                                + "<button type='button' id = 'eliminar_sunday_edit' class='btn btn-xs btn-danger'>delete</button>"
                                + '</td>' + '</tr>'
              $('#table_sunday_edit tr:last').before(row); 
              // input hidden 

              var input_min = "<input type='hidden' " +  "id="+ name_begin + " " + "name="+ name_begin + " "+ "value=" + msg.schedule_data[i]['time_beg'] + " > ";
              var input_max = "<input type='hidden' " +  "id="+ name_end + " " + "name="+ name_end + " " + "value="+ msg.schedule_data[i]['time_end'] + " > ";
              var input_date_sunday = "<input type='hidden' " +  "id="+ date_sunday_edit + " " + "name="+ date_sunday_edit + " " + "value="+ end_fecha + " > ";
              $("#sunday_edit_hidden").append('<p>' + input_min + input_max + input_date_sunday  + '</p>');
              rowCount = $('#table_sunday_edit tr').length;
              $("#rows_sunday_edit").val(rowCount-2);



            }
            // monday 
            if(new_fecha.getDay()==1)
            {

              

              var rowCount = $('#table_monday_edit tr').length;
              rowCount = rowCount - 1;
              var name_begin = 'b_monday_edit'+rowCount;
              var name_end = 'e_monday_edit'+rowCount;
              var date_monday_edit = 'date_monday_edit' + rowCount ;
              var input_pack = "<td>"+ msg.schedule_data[i]['time_beg'] + "</td>";
              var input_special = "<td>"+  msg.schedule_data[i]['time_end'] + "</td>";              
             var input_select = "<td>"+  end_fecha  + "</td>";

              var row =  "<tr>" + input_pack + input_special + input_select
                                +
                                "<td>"+ "<button type='button' id = 'listo_monday_edit' class='btn btn-xs btn-primary'>edit</button> "
                                + "<button type='button' id = 'eliminar_monday_edit' class='btn btn-xs btn-danger'>delete</button>"
                                + '</td>' + '</tr>'
              $('#table_monday_edit tr:last').before(row); 

              // input hidden 

              var input_min = "<input type='hidden' " +  "id="+ name_begin + " " + "name="+ name_begin + " "+ "value=" + msg.schedule_data[i]['time_beg'] + " > ";
              var input_max = "<input type='hidden' " +  "id="+ name_end + " " + "name="+ name_end + " " + "value="+ msg.schedule_data[i]['time_end'] + " > ";
              var input_date_monday = "<input type='hidden' " +  "id="+ date_monday_edit + " " + "name="+ date_monday_edit + " " + "value="+ end_fecha + " > ";
              $("#monday_edit_hidden").append('<p>' + input_min + input_max + input_date_monday  + '</p>');
              rowCount = $('#table_monday_edit tr').length;
              $("#rows_monday_edit").val(rowCount-2);



            }

            // tuesday
            if(new_fecha.getDay()==2)
            {


              var rowCount = $('#table_tuesday_edit tr').length;
              rowCount = rowCount - 1;
              var name_begin = 'b_tuesday_edit'+rowCount;
              var name_end = 'e_tuesday_edit'+rowCount;
              var date_tuesday_edit = 'date_tuesday_edit' + rowCount ;
              var input_pack = "<td>"+ msg.schedule_data[i]['time_beg'] + "</td>";
              var input_special = "<td>"+  msg.schedule_data[i]['time_end'] + "</td>";              
             var input_select = "<td>"+  end_fecha  + "</td>";

              var row =  "<tr>" + input_pack + input_special + input_select
                                +
                                "<td>"+ "<button type='button' id = 'listo_tuesday_edit' class='btn btn-xs btn-primary'>edit</button> "
                                + "<button type='button' id = 'eliminar_tuesday_edit' class='btn btn-xs btn-danger'>delete</button>"
                                + '</td>' + '</tr>'
              $('#table_tuesday_edit tr:last').before(row);

              // input hidden 

              var input_min = "<input type='hidden' " +  "id="+ name_begin + " " + "name="+ name_begin + " "+ "value=" + msg.schedule_data[i]['time_beg'] + " > ";
              var input_max = "<input type='hidden' " +  "id="+ name_end + " " + "name="+ name_end + " " + "value="+ msg.schedule_data[i]['time_end'] + " > ";
              var input_date_tuesday = "<input type='hidden' " +  "id="+ date_tuesday_edit + " " + "name="+ date_tuesday_edit + " " + "value="+ end_fecha + " > ";
              $("#tuesday_edit_hidden").append('<p>' + input_min + input_max + input_date_tuesday  + '</p>');
              rowCount = $('#table_tuesday_edit tr').length;
              $("#rows_tuesday_edit").val(rowCount-2);
              

            }

            // weds
            if(new_fecha.getDay()==3)
            {

              
              var rowCount = $('#table_weds_edit tr').length;
              rowCount = rowCount - 1;
              var name_begin = 'b_weds_edit'+rowCount;
              var name_end = 'e_weds_edit'+rowCount;
              var date_weds_edit = 'date_weds_edit' + rowCount ;
              var input_pack = "<td>"+ msg.schedule_data[i]['time_beg'] + "</td>";
              var input_special = "<td>"+  msg.schedule_data[i]['time_end'] + "</td>";              
             var input_select = "<td>"+  end_fecha  + "</td>";

              var row =  "<tr>" + input_pack + input_special + input_select
                                +
                                "<td>"+ "<button type='button' id = 'listo_weds_edit' class='btn btn-xs btn-primary'>edit</button> "
                                + "<button type='button' id = 'eliminar_weds_edit' class='btn btn-xs btn-danger'>delete</button>"
                                + '</td>' + '</tr>'
              $('#table_weds_edit tr:last').before(row); 
              var input_min = "<input type='hidden' " +  "id="+ name_begin + " " + "name="+ name_begin + " "+ "value=" + msg.schedule_data[i]['time_beg'] + " > ";
              var input_max = "<input type='hidden' " +  "id="+ name_end + " " + "name="+ name_end + " " + "value="+ msg.schedule_data[i]['time_end'] + " > ";
              var input_date_weds = "<input type='hidden' " +  "id="+ date_weds_edit + " " + "name="+ date_weds_edit + " " + "value="+ end_fecha + " > ";
              $("#weds_edit_hidden").append('<p>' + input_min + input_max + input_date_weds  + '</p>');
              rowCount = $('#table_weds_edit tr').length;
              $("#rows_weds_edit").val(rowCount-2);



            }
            //thurday

            if(new_fecha.getDay()==4)
            {


              var rowCount = $('#table_thurday_edit tr').length;
              rowCount = rowCount - 1;
              var name_begin = 'b_thurday_edit'+rowCount;
              var name_end = 'e_thurday_edit'+rowCount;
              var date_thurday_edit = 'date_thurday_edit' + rowCount ;
              var input_pack = "<td>"+ msg.schedule_data[i]['time_beg'] + "</td>";
              var input_special = "<td>"+  msg.schedule_data[i]['time_end'] + "</td>";              
             var input_select = "<td>"+  end_fecha  + "</td>";

              var row =  "<tr>" + input_pack + input_special + input_select
                                +
                                "<td>"+ "<button type='button' id = 'listo_thurday_edit' class='btn btn-xs btn-primary'>edit</button> "
                                + "<button type='button' id = 'eliminar_thurday_edit' class='btn btn-xs btn-danger'>delete</button>"
                                + '</td>' + '</tr>'
              $('#table_thurday_edit tr:last').before(row);  

              // input hidden 

              var input_min = "<input type='hidden' " +  "id="+ name_begin + " " + "name="+ name_begin + " "+ "value=" + msg.schedule_data[i]['time_beg'] + " > ";
              var input_max = "<input type='hidden' " +  "id="+ name_end + " " + "name="+ name_end + " " + "value="+ msg.schedule_data[i]['time_end'] + " > ";
              var input_date_thurday = "<input type='hidden' " +  "id="+ date_thurday_edit + " " + "name="+ date_thurday_edit + " " + "value="+ end_fecha + " > ";
              $("#thurday_edit_hidden").append('<p>' + input_min + input_max + input_date_thurday  + '</p>');
              rowCount = $('#table_thurday_edit tr').length;
              $("#rows_thurday_edit").val(rowCount-2);           


            }
            //friday
            if(new_fecha.getDay()==5)
            {

              
              var rowCount = $('#table_friday_edit tr').length;
              rowCount = rowCount - 1;
              var name_begin = 'b_friday_edit'+rowCount;
              var name_end = 'e_friday_edit'+rowCount;
              var date_friday_edit = 'date_friday_edit' + rowCount ;
              var input_pack = "<td>"+ msg.schedule_data[i]['time_beg'] + "</td>";
              var input_special = "<td>"+  msg.schedule_data[i]['time_end'] + "</td>";              
             var input_select = "<td>"+  end_fecha  + "</td>";

              var row =  "<tr>" + input_pack + input_special + input_select
                                +
                                "<td>"+ "<button type='button' id = 'listo_friday_edit' class='btn btn-xs btn-primary'>edit</button> "
                                + "<button type='button' id = 'eliminar_friday_edit' class='btn btn-xs btn-danger'>delete</button>"
                                + '</td>' + '</tr>'
              $('#table_friday_edit tr:last').before(row); 
                // input hidden 

              var input_min = "<input type='hidden' " +  "id="+ name_begin + " " + "name="+ name_begin + " "+ "value=" + msg.schedule_data[i]['time_beg'] + " > ";
              var input_max = "<input type='hidden' " +  "id="+ name_end + " " + "name="+ name_end + " " + "value="+ msg.schedule_data[i]['time_end'] + " > ";
              var input_date_friday = "<input type='hidden' " +  "id="+ date_friday_edit + " " + "name="+ date_friday_edit + " " + "value="+ end_fecha + " > ";
              $("#friday_edit_hidden").append('<p>' + input_min + input_max + input_date_friday  + '</p>');
              rowCount = $('#table_friday_edit tr').length;
              $("#rows_friday_edit").val(rowCount-2);



            }
            //saturday

            if(new_fecha.getDay()==6)
            {

              var rowCount = $('#table_saturday_edit tr').length;
              rowCount = rowCount - 1;
              var name_begin = 'b_saturday_edit'+rowCount;
              var name_end = 'e_saturday_edit'+rowCount;
              var date_saturday_edit = 'date_saturday_edit' + rowCount ;
              var input_pack = "<td>"+ msg.schedule_data[i]['time_beg'] + "</td>";
              var input_special = "<td>"+  msg.schedule_data[i]['time_end'] + "</td>";              
             var input_select = "<td>"+  end_fecha  + "</td>";

              var row =  "<tr>" + input_pack + input_special + input_select
                                +
                                "<td>"+ "<button type='button' id = 'listo_saturday_edit' class='btn btn-xs btn-primary'>edit</button> "
                                + "<button type='button' id = 'eliminar_saturday_edit' class='btn btn-xs btn-danger'>delete</button>"
                                + '</td>' + '</tr>'
              $('#table_saturday_edit tr:last').before(row);      

              // input hidden 

              var input_min = "<input type='hidden' " +  "id="+ name_begin + " " + "name="+ name_begin + " "+ "value=" + msg.schedule_data[i]['time_beg'] + " > ";
              var input_max = "<input type='hidden' " +  "id="+ name_end + " " + "name="+ name_end + " " + "value="+ msg.schedule_data[i]['time_end'] + " > ";
              var input_date_saturday = "<input type='hidden' " +  "id="+ date_saturday_edit + " " + "name="+ date_saturday_edit + " " + "value="+ end_fecha + " > ";
              $("#saturday_edit_hidden").append('<p>' + input_min + input_max + input_date_saturday  + '</p>');
              rowCount = $('#table_saturday_edit tr').length;
              $("#rows_saturday_edit").val(rowCount-2);         


            }


          } // end for

          // create select
                var fecha = msg.b_date;
      var end_fecha = msg.e_date;

      var fechaf = fecha.split('-');
      var year = fechaf[0];
      var month = fechaf[1];
      var day = fechaf [2];
      var cont = 0;
      var fechas =  new Array();
      var valor = fecha;
      var current_date = new Date(year,month-1,day);
       var end_fechaf = end_fecha.split('-');
       var end_year = end_fechaf[0];
       var end_month = end_fechaf[1];
       var end_day = end_fechaf[2];
       var last_fecha = new Date(end_year,end_month-1,end_day)
       

        var year_result = current_date.getFullYear();
        var month_result = current_date.getMonth()+ 1 ;
        var day_result = current_date.getDate();
        var result = year_result + '-'+ month_result + '-'+day_result;
        fechas[0] = result;

        var cont = 1 ;        
        while (current_date < last_fecha )
        {

          var sumarDias=parseInt(1);
          //console.log(cont);
          current_date.setDate(current_date.getDate() + sumarDias);
          var year_result = current_date.getFullYear();
          var month_result = current_date.getMonth()+ 1 ;
          var day_result = current_date.getDate();
          var result = year_result + '-'+ month_result + '-'+day_result;
          fechas[cont] = result;
          cont++;

        }

       //alert(fechas.toString());
       var select_monday_edit = new Array();
       var cont_monday_edit = 0;
       var select_tuesday_edit = new Array();
       var cont_tuesday_edit = 0;
       var select_weds_edit = new Array();
       var cont_weds_edit = 0;
       var select_thurday_edit = new Array();
       var cont_thurday_edit = 0;
       var select_friday_edit = new Array();
       var cont_friday_edit = 0;
       var select_saturday_edit = new Array();
       var cont_saturday_edit = 0;
       var select_sunday_edit = new Array();
       var cont_sunday_edit = 0;

       for (var i = 0; i < fechas.length; i++) {

           current_date = fechas[i].split('-');
           year = current_date[0];
           month = current_date[1];
           day = current_date[2];

            current_date = new Date(year,month-1,day);

            // domingo
           if (current_date.getDay()==0) {

              select_sunday_edit[cont_sunday_edit] = fechas[i];
              cont_sunday_edit++;
              $("#select_sunday_edit").append( "<p>" + fechas[i] + "<p/>");

           }
           //lunes
           if (current_date.getDay()==1) {

              select_monday_edit[cont_monday_edit] = fechas[i];
              cont_monday_edit++;
              $("#select_monday_edit").append( "<p>" + fechas[i] + "<p/>");

           }
           // martes
           if (current_date.getDay()==2) {

              select_tuesday_edit[cont_tuesday_edit] = fechas[i];
              cont_tuesday_edit++;
              $("#select_tuesday_edit").append( "<p>" + fechas[i] + "<p/>");

           }
           //miercoles
           if (current_date.getDay()==3) {

              select_weds_edit[cont_weds_edit] = fechas[i];
              cont_weds_edit++;
              $("#select_weds_edit").append( "<p>" + fechas[i] + "<p/>");

           }

           // jueves
           if (current_date.getDay()==4) {

              select_thurday_edit[cont_thurday_edit] = fechas[i];
              cont_thurday_edit++;
              $("#select_thurday_edit").append( "<p>" + fechas[i] + "<p/>");

           }
           // viernes
           if (current_date.getDay()==5) {

              select_friday_edit[cont_friday_edit] = fechas[i];
              cont_friday_edit++;
              $("#select_friday_edit").append( "<p>" + fechas[i] + "<p/>");

           }

           // sabado
           if (current_date.getDay()==6) {

              select_saturday_edit[cont_saturday_edit] = fechas[i];
              cont_saturday_edit++;
              $("#select_saturday_edit").append( "<p>" + fechas[i] + "<p/>");
           }
        

       }


        

    } // end if


				//generate category
				var cont_category = msg.cont_category;
				var category = msg.category;
				var subcategory ;
				var select  = "" ;
				for (var i = 0; i < cont_category; i++) {
					
					select += "<option value='"+ category[i]['id']+"'>"+ category[i]['coll_categories_category']+"</option>";
					if(msg.collaborator_id == category[i]['id'])
					{


						subcategory = category[i]['coll_categories_subcategory'];
					}

				}

					//select 
				  $("#edit_content_to_city").html(select);
				  $(".edit_the-return").html( "subcategory: " + subcategory + "<br />");
				  //topics

				  var cont_topic = msg.cont_topic;
				  var select_topic = "";
				  var topics = msg.topics;

				  for (var i = 0; i < cont_topic; i++) {
				  	

				  	select_topic += "<option value='"+ topics[i]['topics_id']+"'>"+ topics[i]['topic']+"</option>";

				  }
				
				  $("#edit_topics").html(select_topic);
				  $("#edit_topics").val(msg.current_topic);
                  //
                  $("#id_event_edit").val(id);

                  // show photo
                  	var path;
                  	              
                  $("#edit_show_images").empty();
                  // count photo
                  $("#edit_cont_img").val(msg.cont_photo);
                  for (var i = 0; i < msg.cont_photo; i++) {

                  	var element = "";
                  	path =  msg.photos[i]['path'];
                    var data = path.split('/');
                    
                    data = data[2];
                  	var pathname = window.location.pathname;
                    var cont = i + 1;
                    var name_img = "name = edit_name_img" +  cont ;
                    var valor = "value = " + data;                  
                    var input = "<input type='hidden' " + name_img + " "+ valor + ">";
                    $("#edit_name_img_div").append(input);
                  	 pathname+= path;
                     element ="<p> <img src="+ pathname + "> &nbsp;&nbsp;<label>  Is cover </label> &nbsp;&nbsp;<input type= 'radio' name = 'edit_cover'> &nbsp;&nbsp; <a href ='#' class= 'remove_image_div' ><span class='glyphicon glyphicon-trash'></span> </a> </p>" 

                  	
                  	$("#edit_show_images").append(element);

                  }

                  // load map 
                  var lat = msg.lat;
                  var lng = msg.lng;
                  $("#edit_lat").val(lat);
                  $("#edit_lng").val(lng);

                  // price unique
                  //$("#edit_Outdoor").attr('checked',true);
                  var has_price_unique = msg.has_price_unique;
                  if (has_price_unique == true) {

                      $("#edit_unique").attr('checked',true);
                      //price_unique
                      $("#edit_price_unique").val(msg.price_unique);
                      $("#edit_by_age").hide();

                  }

                  // notes 
                  $("#edit_notes").val(msg.notes);


				//show form
				$("#edit_modal").modal('show');
					

				
			},
			error: function(){
				alert("failure");
			}		
		});

 		 	//$("#edit_modal").modal('show');

 		 }
      else 
         if(action == "show")
      {

        $.ajax({
      
          url: "classes/ShowEvent.php", 
          data: {id:id},
          type: "POST",
          async: false,
          dataType: "JSON",
          success: function(data){
            var name = data.name_event;
            var city =  data.city;
            var b_date = data.b_date;
            var e_date = data.e_date;
            var language = data.language_event;
            var description = data.description_event;
            var brief_description = data.brief_description
            $("#show_name").html(" <strong> Name:</strong>"+ " "+ name);
            $("#show_city").html(" <strong> City:</strong>"+ " "+ city);
            $("#show_b_date").html(" <strong> Begin date:</strong>"+ " "+ b_date);
            $("#show_e_date").html(" <strong> End Date:</strong>"+ " "+ e_date);
            $("#show_language").html(" <strong> Language:</strong>"+ " "+ language);
            $("#show_brief_description").html(" <strong> Brief description:</strong>"+ " "+ brief_description);
            $("#show_description").html(" <strong> Description:</strong>"+ " "+ description);
            

            
            
            $("#show_event").modal('show');

          },
          error: function(){
            alert("failure");
          }   
        });

        


      }
 		 else // remove
 		 {

 		 	$("#id_event").val(id);
 		 	$("#remove_modal").modal('show');		 	

 		 }

 	});
 });