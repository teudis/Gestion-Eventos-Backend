$(document).ready(function() { 



// click button done


$("#table_friday_edit").on('click','button#listo_friday_edit',function(event){


        event.preventDefault();
        var rowCount = $('#table_friday_edit tr').length;
        rowCount = rowCount - 1;
        var rowIndex_friday_edit = ($(this).closest('td').parent()[0].sectionRowIndex);
        // crear tr
        
        var id = rowCount - 1;
  		var name_pack = "b_friday_edit"+ id;  		
  		name_pack = $('#'+ name_pack).val();
  		var name_special = 'e_friday_edit'+ id;
  		name_special = $('#'+ name_special).val();
      var date_friday_edit = "date_friday_edit" + id;
  		date_friday_edit = $('#'+ date_friday_edit).val();
  		if(name_pack == "" || name_special =="")
  		{

  			alert("Must insert values into dates ");
			

  		}
       else{
  
		  var input_min = "<td>"+ name_pack + "</td>"
		  var input_max = "<td>"+  name_special  + "</td>"
      var input_date =  "<td>"+  date_friday_edit  + "</td>"

		   var count_element_friday_edit = $("#rows_friday_edit").val();
  		 var row =  "<tr>" + input_min + input_max + input_date +
                    "<td>"+ "<button type='button' id = 'editar_friday_edit' class='btn btn-xs btn-primary'>edit</button> "
                    + "<button type='button' id = 'eliminar_friday_edit' class='btn btn-xs btn-danger'>delete</button>"
                    + '</td>' + '</tr>'
	        $("#table_friday_edit tr").eq(rowIndex_friday_edit).remove();
	          var pos = rowIndex_friday_edit;
	         var ubication_friday_edit = "table_friday_edit tr:eq(" + pos + ")";
	        //$('#prices_age tr:eq(0)').after(row);
	        $('#'+ubication_friday_edit).before(row);
	        // add input 

	        name_pack_id = "b_friday_edit" + id;
	        name_special_id = 'e_friday_edit' + id;
          name_date_id = 'date_friday_edit' + id;
	             

	       var input_min = "<input type='hidden' " +  "id="+ name_pack_id + " " + "name="+ name_pack_id + " "+ "value=" + name_pack + " > ";
	       var input_max = "<input type='hidden' " +  "id="+ name_special_id + " " + "name="+ name_special_id + " " + "value="+ name_special + " > ";
         var input_date_friday_edit = "<input type='hidden' " +  "id="+ name_date_id + " " + "name="+ name_date_id + " " + "value="+ date_friday_edit + " > ";
	         if(  count_element_friday_edit >= rowIndex_friday_edit)
		   {
		   		
		   		//alert("actulizo");

		   		$('#' + name_pack_id).remove();
		   		$('#' + name_special_id).remove();
          $('#' +  name_date_id).remove();
		   		var pos = rowIndex_friday_edit - 1;  
				 var ubication_friday_edit = "friday_edit_hidden :eq(" + pos + ")";
				 //$('#prices_age tr:eq(0)').after(row);
				  $('#'+ubication_friday_edit).before('<p>' + input_min + input_max + input_date_friday_edit + '</p>');

		   } 
		   else{

	       		$("#friday_edit_hidden").append('<p>' + input_min + input_max + input_date_friday_edit  + '</p>');
	       		rowCount = $('#table_friday_edit tr').length;
  		   		$("#rows_friday_edit").val(rowCount-2);
	       
	       }
	       
        
	        } // end else

    }
);  

	// event edit prices pack

	$("#table_friday_edit").on('click','button#editar_friday_edit',function(event){


        event.preventDefault(); 
        var rowIndex_friday_edit_edit = ($(this).closest('td').parent()[0].sectionRowIndex);
        $("#table_friday_edit tr").eq(rowIndex_friday_edit_edit).remove();
        // create tr

  var name_pack = 'b_friday_edit'+ rowIndex_friday_edit_edit;
  var name_special = 'e_friday_edit'+ rowIndex_friday_edit_edit;
  var date_friday_edit = 'date_friday_edit' + rowIndex_friday_edit_edit;
  var value_name_pack = $('#' + name_pack).val();
  var value_name_special = $('#' + name_special).val();
  var value_date_friday_edit = $('#' + date_friday_edit).val();
  var input_min = "<td>"+ "<input type='text' " +  "id="+name_pack + " " + "name="+ name_pack +  " "+ "value="+  value_name_pack + " size='12'> " + "</td>"
  var input_max = "<td>"+ "<input type='text' " + "id="+name_special + " " + "name="+ name_special +  " "+ "value="+  value_name_special + " size='12'> " + "</td>"
  var select  = "" ;
  var select_full_friday_edit = "" ;
  $('#select_friday_edit p').each(function(){
         var content = $(this).text();
        
         if(content != "")
         {

           console.log(content);
          select += "<option value='"+ content+"'>"+ content +"</option>";

         }

        select_full_friday_edit = "<select class='form-control' " + "name=" + date_friday_edit + " id=" + date_friday_edit + " >" + select + " </select>";
         
              
        }); 
  var input_select = "<td>"+  select_full_friday_edit  + "</td>";
  var row_pack =  "<tr>" + input_min + input_max + input_select 
                    +
                    "<td>"+ "<button type='button' id = 'listo_friday_edit' class='btn btn-xs btn-primary'>Done</button> "
                    + "<button type='button' id = 'eliminar_friday_edit' class='btn btn-xs btn-danger'>delete</button>"
                    + '</td>' + '</tr>'	

  var pos = rowIndex_friday_edit_edit;
  
  var ubication_friday_edit = "table_friday_edit tr:eq(" + pos + ")";
 //$('#prices_age tr:eq(0)').after(row);
  $('#'+ubication_friday_edit).before(row_pack);       
  $('#' + date_friday_edit).val(value_date_friday_edit);
	
    });



	// click button delete add event

	$("#table_friday_edit").on('click','button#eliminar_friday_edit',function(event){


        event.preventDefault();        
        var rowIndex2 = ($(this).closest('td').parent()[0].sectionRowIndex);
        $("#table_friday_edit tr").eq(rowIndex2).remove();
        $("#friday_edit_hidden p").eq(rowIndex2 - 1 ).remove();
        rowCount = $('#table_friday_edit tr').length;
  		  $("#rows_friday_edit").val(rowCount-2);

	
    });

});

