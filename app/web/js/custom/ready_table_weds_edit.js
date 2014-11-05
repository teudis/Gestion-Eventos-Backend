$(document).ready(function() { 



// click button done


$("#table_weds_edit").on('click','button#listo_weds_edit',function(event){


        event.preventDefault();
        var rowCount = $('#table_weds_edit tr').length;
        rowCount = rowCount - 1;
        var rowIndex_weds_edit = ($(this).closest('td').parent()[0].sectionRowIndex);
        // crear tr
        
        var id = rowCount - 1;
  		var name_pack = "b_weds_edit"+ id;  		
  		name_pack = $('#'+ name_pack).val();
  		var name_special = 'e_weds_edit'+ id;
  		name_special = $('#'+ name_special).val();
      var date_weds_edit = "date_weds_edit" + id;
  		date_weds_edit = $('#'+ date_weds_edit).val();
  		if(name_pack == "" || name_special =="")
  		{

  			alert("Must insert values into dates ");
			

  		}
       else{
  
		  var input_min = "<td>"+ name_pack + "</td>"
		  var input_max = "<td>"+  name_special  + "</td>"
      var input_date =  "<td>"+  date_weds_edit  + "</td>"

		   var count_element_weds_edit = $("#rows_weds_edit").val();
  		 var row =  "<tr>" + input_min + input_max + input_date +
                    "<td>"+ "<button type='button' id = 'editar_weds_edit' class='btn btn-xs btn-primary'>edit</button> "
                    + "<button type='button' id = 'eliminar_weds_edit' class='btn btn-xs btn-danger'>delete</button>"
                    + '</td>' + '</tr>'
	        $("#table_weds_edit tr").eq(rowIndex_weds_edit).remove();
	          var pos = rowIndex_weds_edit;
	         var ubication_weds_edit = "table_weds_edit tr:eq(" + pos + ")";
	        //$('#prices_age tr:eq(0)').after(row);
	        $('#'+ubication_weds_edit).before(row);
	        // add input 

	        name_pack_id = "b_weds_edit" + id;
	        name_special_id = 'e_weds_edit' + id;
          name_date_id = 'date_weds_edit' + id;
	             

	       var input_min = "<input type='hidden' " +  "id="+ name_pack_id + " " + "name="+ name_pack_id + " "+ "value=" + name_pack + " > ";
	       var input_max = "<input type='hidden' " +  "id="+ name_special_id + " " + "name="+ name_special_id + " " + "value="+ name_special + " > ";
         var input_date_weds_edit = "<input type='hidden' " +  "id="+ name_date_id + " " + "name="+ name_date_id + " " + "value="+ date_weds_edit + " > ";
	         if(  count_element_weds_edit >= rowIndex_weds_edit)
		   {
		   		
		   		//alert("actulizo");

		   		$('#' + name_pack_id).remove();
		   		$('#' + name_special_id).remove();
          $('#' +  name_date_id).remove();
		   		var pos = rowIndex_weds_edit - 1;  
				 var ubication_weds_edit = "weds_edit_hidden :eq(" + pos + ")";
				 //$('#prices_age tr:eq(0)').after(row);
				  $('#'+ubication_weds_edit).before('<p>' + input_min + input_max + input_date_weds_edit + '</p>');

		   } 
		   else{

	       		$("#weds_edit_hidden").append('<p>' + input_min + input_max + input_date_weds_edit  + '</p>');
	       		rowCount = $('#table_weds_edit tr').length;
  		   		$("#rows_weds_edit").val(rowCount-2);
	       
	       }
	       
        
	        } // end else

    }
);  

	// event edit prices pack

	$("#table_weds_edit").on('click','button#editar_weds_edit',function(event){


        event.preventDefault(); 
        var rowIndex_weds_edit_edit = ($(this).closest('td').parent()[0].sectionRowIndex);
        $("#table_weds_edit tr").eq(rowIndex_weds_edit_edit).remove();
        // create tr

  var name_pack = 'b_weds_edit'+ rowIndex_weds_edit_edit;
  var name_special = 'e_weds_edit'+ rowIndex_weds_edit_edit;
  var date_weds_edit = 'date_weds_edit' + rowIndex_weds_edit_edit;
  var value_name_pack = $('#' + name_pack).val();
  var value_name_special = $('#' + name_special).val();
  var value_date_weds_edit = $('#' + date_weds_edit).val();
  var input_min = "<td>"+ "<input type='text' " +  "id="+name_pack + " " + "name="+ name_pack +  " "+ "value="+  value_name_pack + " size='12'> " + "</td>"
  var input_max = "<td>"+ "<input type='text' " + "id="+name_special + " " + "name="+ name_special +  " "+ "value="+  value_name_special + " size='12'> " + "</td>"
  var select  = "" ;
  var select_full_weds_edit = "" ;
  $('#select_weds_edit p').each(function(){
         var content = $(this).text();
        
         if(content != "")
         {

           console.log(content);
          select += "<option value='"+ content+"'>"+ content +"</option>";

         }

        select_full_weds_edit = "<select class='form-control' " + "name=" + date_weds_edit + " id=" + date_weds_edit + " >" + select + " </select>";
         
              
        }); 
  var input_select = "<td>"+  select_full_weds_edit  + "</td>";
  var row_pack =  "<tr>" + input_min + input_max + input_select 
                    +
                    "<td>"+ "<button type='button' id = 'listo_weds_edit' class='btn btn-xs btn-primary'>Done</button> "
                    + "<button type='button' id = 'eliminar_weds_edit' class='btn btn-xs btn-danger'>delete</button>"
                    + '</td>' + '</tr>'	

  var pos = rowIndex_weds_edit_edit;
  
  var ubication_weds_edit = "table_weds_edit tr:eq(" + pos + ")";
 //$('#prices_age tr:eq(0)').after(row);
  $('#'+ubication_weds_edit).before(row_pack);       
  $('#' + date_weds_edit).val(value_date_weds_edit);
	
    });



	// click button delete add event

	$("#table_weds_edit").on('click','button#eliminar_weds_edit',function(event){


        event.preventDefault();        
        var rowIndex2 = ($(this).closest('td').parent()[0].sectionRowIndex);
        $("#table_weds_edit tr").eq(rowIndex2).remove();
        $("#weds_edit_hidden p").eq(rowIndex2 - 1 ).remove();
        rowCount = $('#table_weds_edit tr').length;
  		  $("#rows_weds_edit").val(rowCount-2);

	
    });

});

