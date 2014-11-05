$(document).ready(function() { 



// click button done


$("#table_tuesday").on('click','button#listo_tuesday',function(event){


        event.preventDefault();
        var rowCount = $('#table_tuesday tr').length;
        rowCount = rowCount - 1;
        var rowIndex_tuesday = ($(this).closest('td').parent()[0].sectionRowIndex);
        // crear tr
        
      var id = rowCount - 1;
  		var name_pack = "b_tuesday" + id;  		
  		name_pack = $('#'+ name_pack).val();
  		var name_special = 'e_tuesday'+ id;
  		name_special = $('#'+ name_special).val();
      var date_tuesday = "date_tuesday" + id;
  		date_tuesday = $('#'+ date_tuesday).val();
  		if(name_pack == "" || name_special =="")
  		{

  			alert("Must insert values into dates ");
			

  		}
       else{
  
		  var input_min = "<td>"+ name_pack + "</td>"
		  var input_max = "<td>"+  name_special  + "</td>"
      var input_date =  "<td>"+  date_tuesday  + "</td>"

		   var count_element_tuesday = $("#rows_tuesday").val();
  		 var row =  "<tr>" + input_min + input_max + input_date +
                    "<td>"+ "<button type='button' id = 'editar_tuesday' class='btn btn-xs btn-primary'>edit</button> "
                    + "<button type='button' id = 'eliminar_tuesday' class='btn btn-xs btn-danger'>delete</button>"
                    + '</td>' + '</tr>'
	        $("#table_tuesday tr").eq(rowIndex_tuesday).remove();
	          var pos = rowIndex_tuesday;
	         var ubication_tuesday = "table_tuesday tr:eq(" + pos + ")";
	        //$('#prices_age tr:eq(0)').after(row);
	        $('#'+ubication_tuesday).before(row);
	        // add input 

	        name_pack_id = "b_tuesday" + id;
	        name_special_id = 'e_tuesday' + id;
          name_date_id = 'date_tuesday' + id;
	             

	       var input_min = "<input type='hidden' " +  "id="+ name_pack_id + " " + "name="+ name_pack_id + " "+ "value=" + name_pack + " > ";
	       var input_max = "<input type='hidden' " +  "id="+ name_special_id + " " + "name="+ name_special_id + " " + "value="+ name_special + " > ";
         var input_date_tuesday = "<input type='hidden' " +  "id="+ name_date_id + " " + "name="+ name_date_id + " " + "value="+ date_tuesday + " > ";
	         if(  count_element_tuesday >= rowIndex_tuesday)
		   {
		   		
		   		//alert("actulizo");

		   		$('#' + name_pack_id).remove();
		   		$('#' + name_special_id).remove();
          $('#' +  name_date_id).remove();
		   		var pos = rowIndex_tuesday - 1;  
				 var ubication_tuesday = "tuesday_hidden :eq(" + pos + ")";
				 //$('#prices_age tr:eq(0)').after(row);
				  $('#'+ubication_tuesday).before('<p>' + input_min + input_max + input_date_tuesday + '</p>');

		   } 
		   else{

	       		$("#tuesday_hidden").append('<p>' + input_min + input_max + input_date_tuesday  + '</p>');
	       		rowCount = $('#table_tuesday tr').length;
  		   		$("#rows_tuesday").val(rowCount-2);
	       
	       }
	       
        
	        } // end else

    }
);  

	// event edit prices pack

	$("#table_tuesday").on('click','button#editar_tuesday',function(event){


        event.preventDefault(); 
        var rowIndex_tuesday_edit = ($(this).closest('td').parent()[0].sectionRowIndex);
        $("#table_tuesday tr").eq(rowIndex_tuesday_edit).remove();
        // create tr

  var name_pack = 'b_tuesday'+ rowIndex_tuesday_edit;
  var name_special = 'e_tuesday'+ rowIndex_tuesday_edit;
  var date_tuesday = 'date_tuesday' + rowIndex_tuesday_edit;
  var value_name_pack = $('#' + name_pack).val();
  var value_name_special = $('#' + name_special).val();
  var value_date_tuesday = $('#' + date_tuesday).val();
  var input_min = "<td>"+ "<input type='text' " +  "id="+name_pack + " " + "name="+ name_pack +  " "+ "value="+  value_name_pack + " size='12'> " + "</td>"
  var input_max = "<td>"+ "<input type='text' " + "id="+name_special + " " + "name="+ name_special +  " "+ "value="+  value_name_special + " size='12'> " + "</td>"
  var select  = "" ;
  var select_full_tuesday = "" ;
  $('#select_tuesday p').each(function(){
         var content = $(this).text();
        
         if(content != "")
         {

           console.log(content);
          select += "<option value='"+ content+"'>"+ content +"</option>";

         }

        select_full_tuesday = "<select class='form-control' " + "name=" + date_tuesday + " id=" + date_tuesday + " >" + select + " </select>";
         
              
        }); 
  var input_select = "<td>"+  select_full_tuesday  + "</td>";
  var row_pack =  "<tr>" + input_min + input_max + input_select 
                    +
                    "<td>"+ "<button type='button' id = 'listo_tuesday' class='btn btn-xs btn-primary'>Done</button> "
                    + "<button type='button' id = 'eliminar_tuesday' class='btn btn-xs btn-danger'>delete</button>"
                    + '</td>' + '</tr>'	

  var pos = rowIndex_tuesday_edit;
  
  var ubication_tuesday = "table_tuesday tr:eq(" + pos + ")";
 //$('#prices_age tr:eq(0)').after(row);
  $('#'+ubication_tuesday).before(row_pack);       
  $('#' + date_tuesday).val(value_date_tuesday);
	
    });



	// click button delete add event

	$("#table_tuesday").on('click','button#eliminar_tuesday',function(event){


        event.preventDefault();        
        var rowIndex2 = ($(this).closest('td').parent()[0].sectionRowIndex);
        $("#table_tuesday tr").eq(rowIndex2).remove();
        $("#tuesday_hidden p").eq(rowIndex2 - 1 ).remove();
        rowCount = $('#table_tuesday tr').length;
  		  $("#rows_tuesday").val(rowCount-2);

	
    });

});

