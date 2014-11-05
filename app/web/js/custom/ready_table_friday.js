$(document).ready(function() { 



// click button done


$("#table_friday").on('click','button#listo_friday',function(event){


        event.preventDefault();
        var rowCount = $('#table_friday tr').length;
        rowCount = rowCount - 1;
        var rowIndex_friday = ($(this).closest('td').parent()[0].sectionRowIndex);
        // crear tr
        
        var id = rowCount - 1;
  		var name_pack = "b_friday"+ id;  		
  		name_pack = $('#'+ name_pack).val();
  		var name_special = 'e_friday'+ id;
  		name_special = $('#'+ name_special).val();
      var date_friday = "date_friday" + id;
  		date_friday = $('#'+ date_friday).val();
  		if(name_pack == "" || name_special =="")
  		{

  			alert("Must insert values into dates ");
			

  		}
       else{
  
		  var input_min = "<td>"+ name_pack + "</td>"
		  var input_max = "<td>"+  name_special  + "</td>"
      var input_date =  "<td>"+  date_friday  + "</td>"

		   var count_element_friday = $("#rows_friday").val();
  		 var row =  "<tr>" + input_min + input_max + input_date +
                    "<td>"+ "<button type='button' id = 'editar_friday' class='btn btn-xs btn-primary'>edit</button> "
                    + "<button type='button' id = 'eliminar_friday' class='btn btn-xs btn-danger'>delete</button>"
                    + '</td>' + '</tr>'
	        $("#table_friday tr").eq(rowIndex_friday).remove();
	          var pos = rowIndex_friday;
	         var ubication_friday = "table_friday tr:eq(" + pos + ")";
	        //$('#prices_age tr:eq(0)').after(row);
	        $('#'+ubication_friday).before(row);
	        // add input 

	        name_pack_id = "b_friday" + id;
	        name_special_id = 'e_friday' + id;
          name_date_id = 'date_friday' + id;
	             

	       var input_min = "<input type='hidden' " +  "id="+ name_pack_id + " " + "name="+ name_pack_id + " "+ "value=" + name_pack + " > ";
	       var input_max = "<input type='hidden' " +  "id="+ name_special_id + " " + "name="+ name_special_id + " " + "value="+ name_special + " > ";
         var input_date_friday = "<input type='hidden' " +  "id="+ name_date_id + " " + "name="+ name_date_id + " " + "value="+ date_friday + " > ";
	         if(  count_element_friday >= rowIndex_friday)
		   {
		   		
		   		//alert("actulizo");

		   		$('#' + name_pack_id).remove();
		   		$('#' + name_special_id).remove();
          $('#' +  name_date_id).remove();
		   		var pos = rowIndex_friday - 1;  
				 var ubication_friday = "friday_hidden :eq(" + pos + ")";
				 //$('#prices_age tr:eq(0)').after(row);
				  $('#'+ubication_friday).before('<p>' + input_min + input_max + input_date_friday + '</p>');

		   } 
		   else{

	       		$("#friday_hidden").append('<p>' + input_min + input_max + input_date_friday  + '</p>');
	       		rowCount = $('#table_friday tr').length;
  		   		$("#rows_friday").val(rowCount-2);
	       
	       }
	       
        
	        } // end else

    }
);  

	// event edit prices pack

	$("#table_friday").on('click','button#editar_friday',function(event){


        event.preventDefault(); 
        var rowIndex_friday_edit = ($(this).closest('td').parent()[0].sectionRowIndex);
        $("#table_friday tr").eq(rowIndex_friday_edit).remove();
        // create tr

  var name_pack = 'b_friday'+ rowIndex_friday_edit;
  var name_special = 'e_friday'+ rowIndex_friday_edit;
  var date_friday = 'date_friday' + rowIndex_friday_edit;
  var value_name_pack = $('#' + name_pack).val();
  var value_name_special = $('#' + name_special).val();
  var value_date_friday = $('#' + date_friday).val();
  var input_min = "<td>"+ "<input type='text' " +  "id="+name_pack + " " + "name="+ name_pack +  " "+ "value="+  value_name_pack + " size='12'> " + "</td>"
  var input_max = "<td>"+ "<input type='text' " + "id="+name_special + " " + "name="+ name_special +  " "+ "value="+  value_name_special + " size='12'> " + "</td>"
  var select  = "" ;
  var select_full_friday = "" ;
  $('#select_friday p').each(function(){
         var content = $(this).text();
        
         if(content != "")
         {

           console.log(content);
          select += "<option value='"+ content+"'>"+ content +"</option>";

         }

        select_full_friday = "<select class='form-control' " + "name=" + date_friday + " id=" + date_friday + " >" + select + " </select>";
         
              
        }); 
  var input_select = "<td>"+  select_full_friday  + "</td>";
  var row_pack =  "<tr>" + input_min + input_max + input_select 
                    +
                    "<td>"+ "<button type='button' id = 'listo_friday' class='btn btn-xs btn-primary'>Done</button> "
                    + "<button type='button' id = 'eliminar_friday' class='btn btn-xs btn-danger'>delete</button>"
                    + '</td>' + '</tr>'	

  var pos = rowIndex_friday_edit;
  
  var ubication_friday = "table_friday tr:eq(" + pos + ")";
 //$('#prices_age tr:eq(0)').after(row);
  $('#'+ubication_friday).before(row_pack);       
  $('#' + date_friday).val(value_date_friday);
	
    });



	// click button delete add event

	$("#table_friday").on('click','button#eliminar_friday',function(event){


        event.preventDefault();        
        var rowIndex2 = ($(this).closest('td').parent()[0].sectionRowIndex);
        $("#table_friday tr").eq(rowIndex2).remove();
        $("#friday_hidden p").eq(rowIndex2 - 1 ).remove();
        rowCount = $('#table_friday tr').length;
  		  $("#rows_friday").val(rowCount-2);

	
    });

});

