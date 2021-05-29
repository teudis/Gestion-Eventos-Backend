$(document).ready(function() { 



// click button done


$("#table_saturday").on('click','button#listo_saturday',function(event){


        event.preventDefault();
        var rowCount = $('#table_saturday tr').length;
        rowCount = rowCount - 1;
        var rowIndex_saturday = ($(this).closest('td').parent()[0].sectionRowIndex);
        // crear tr
        
        var id = rowCount - 1;
  		var name_pack = "b_saturday"+ id;  		
  		name_pack = $('#'+ name_pack).val();
  		var name_special = 'e_saturday'+ id;
  		name_special = $('#'+ name_special).val();
      var date_saturday = "date_saturday" + id;
  		date_saturday = $('#'+ date_saturday).val();
  		if(name_pack == "" || name_special =="")
  		{

  			alert("Must insert values into dates ");
			

  		}
       else{
  
		  var input_min = "<td>"+ name_pack + "</td>"
		  var input_max = "<td>"+  name_special  + "</td>"
      var input_date =  "<td>"+  date_saturday  + "</td>"

		   var count_element_saturday = $("#rows_saturday").val();
  		 var row =  "<tr>" + input_min + input_max + input_date +
                    "<td>"+ "<button type='button' id = 'editar_saturday' class='btn btn-xs btn-primary'>edit</button> "
                    + "<button type='button' id = 'eliminar_saturday' class='btn btn-xs btn-danger'>delete</button>"
                    + '</td>' + '</tr>'
	        $("#table_saturday tr").eq(rowIndex_saturday).remove();
	          var pos = rowIndex_saturday;
	         var ubication_saturday = "table_saturday tr:eq(" + pos + ")";
	        //$('#prices_age tr:eq(0)').after(row);
	        $('#'+ubication_saturday).before(row);
	        // add input 

	        name_pack_id = "b_saturday" + id;
	        name_special_id = 'e_saturday' + id;
          name_date_id = 'date_saturday' + id;
	             

	       var input_min = "<input type='hidden' " +  "id="+ name_pack_id + " " + "name="+ name_pack_id + " "+ "value=" + name_pack + " > ";
	       var input_max = "<input type='hidden' " +  "id="+ name_special_id + " " + "name="+ name_special_id + " " + "value="+ name_special + " > ";
         var input_date_saturday = "<input type='hidden' " +  "id="+ name_date_id + " " + "name="+ name_date_id + " " + "value="+ date_saturday + " > ";
	         if(  count_element_saturday >= rowIndex_saturday)
		   {
		   		
		   		//alert("actulizo");

		   		$('#' + name_pack_id).remove();
		   		$('#' + name_special_id).remove();
          $('#' +  name_date_id).remove();
		   		var pos = rowIndex_saturday - 1;  
				 var ubication_saturday = "saturday_hidden :eq(" + pos + ")";
				 //$('#prices_age tr:eq(0)').after(row);
				  $('#'+ubication_saturday).before('<p>' + input_min + input_max + input_date_saturday + '</p>');

		   } 
		   else{

	       		$("#saturday_hidden").append('<p>' + input_min + input_max + input_date_saturday  + '</p>');
	       		rowCount = $('#table_saturday tr').length;
  		   		$("#rows_saturday").val(rowCount-2);
	       
	       }
	       
        
	        } // end else

    }
);  

	// event edit prices pack

	$("#table_saturday").on('click','button#editar_saturday',function(event){


        event.preventDefault(); 
        var rowIndex_saturday_edit = ($(this).closest('td').parent()[0].sectionRowIndex);
        $("#table_saturday tr").eq(rowIndex_saturday_edit).remove();
        // create tr

  var name_pack = 'b_saturday'+ rowIndex_saturday_edit;
  var name_special = 'e_saturday'+ rowIndex_saturday_edit;
  var date_saturday = 'date_saturday' + rowIndex_saturday_edit;
  var value_name_pack = $('#' + name_pack).val();
  var value_name_special = $('#' + name_special).val();
  var value_date_saturday = $('#' + date_saturday).val();
  var input_min = "<td>"+ "<input type='text' " +  "id="+name_pack + " " + "name="+ name_pack +  " "+ "value="+  value_name_pack + " size='12'> " + "</td>"
  var input_max = "<td>"+ "<input type='text' " + "id="+name_special + " " + "name="+ name_special +  " "+ "value="+  value_name_special + " size='12'> " + "</td>"
  var select  = "" ;
  var select_full_saturday = "" ;
  $('#select_saturday p').each(function(){
         var content = $(this).text();
        
         if(content != "")
         {

           console.log(content);
          select += "<option value='"+ content+"'>"+ content +"</option>";

         }

        select_full_saturday = "<select class='form-control' " + "name=" + date_saturday + " id=" + date_saturday + " >" + select + " </select>";
         
              
        }); 
  var input_select = "<td>"+  select_full_saturday  + "</td>";
  var row_pack =  "<tr>" + input_min + input_max + input_select 
                    +
                    "<td>"+ "<button type='button' id = 'listo_saturday' class='btn btn-xs btn-primary'>Done</button> "
                    + "<button type='button' id = 'eliminar_saturday' class='btn btn-xs btn-danger'>delete</button>"
                    + '</td>' + '</tr>'	

  var pos = rowIndex_saturday_edit;
  
  var ubication_saturday = "table_saturday tr:eq(" + pos + ")";
 //$('#prices_age tr:eq(0)').after(row);
  $('#'+ubication_saturday).before(row_pack);       
  $('#' + date_saturday).val(value_date_saturday);
	
    });



	// click button delete add event

	$("#table_saturday").on('click','button#eliminar_saturday',function(event){


        event.preventDefault();        
        var rowIndex2 = ($(this).closest('td').parent()[0].sectionRowIndex);
        $("#table_saturday tr").eq(rowIndex2).remove();
        $("#saturday_hidden p").eq(rowIndex2 - 1 ).remove();
        rowCount = $('#table_saturday tr').length;
  		  $("#rows_saturday").val(rowCount-2);

	
    });

});

