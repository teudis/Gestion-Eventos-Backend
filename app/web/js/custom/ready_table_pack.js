$(document).ready(function() { 



// click button done


$("#pack_special").on('click','button#listo_price_pack',function(event){


        event.preventDefault();
        var rowCount = $('#pack_special tr').length;
        rowCount = rowCount - 1;
        var rowIndex_pack = ($(this).closest('td').parent()[0].sectionRowIndex);
        // crear tr
        
        var id = rowCount - 1;
  		var name_pack = "pack"+ id;  		
  		name_pack = $('#'+ name_pack).val();
  		var name_special = 'special'+ id;
  		name_special = $('#'+ name_special).val();
  		
  		if(name_pack == "" || name_special =="")
  		{

  			alert("Must insert values into Table special prices");
			

  		}
       else{
  
		  var input_min = "<td>"+ name_pack + "</td>"
		  var input_max = "<td>"+  name_special  + "</td>"

		   var count_element = $("#rows_special").val();
  		 var row =  "<tr>" + input_min + input_max + 
                    "<td>"+ "<button type='button' id = 'editar_price_pack' class='btn btn-xs btn-primary'>edit</button> "
                    + "<button type='button' id = 'eliminar_price_pack' class='btn btn-xs btn-danger'>delete</button>"
                    + '</td>' + '</tr>'
	        $("#pack_special tr").eq(rowIndex_pack).remove();
	          var pos = rowIndex_pack;
	         var ubication = "pack_special tr:eq(" + pos + ")";
	        //$('#prices_age tr:eq(0)').after(row);
	        $('#'+ubication).before(row);
	        // add input 

	        name_pack_id = "pack" + id;
	        name_special_id = 'special' + id;
	             

	       var input_min = "<input type='hidden' " +  "id="+ name_pack_id + " " + "name="+ name_pack_id + " "+ "value=" + name_pack + " > ";
	       var input_max = "<input type='hidden' " +  "id="+ name_special_id + " " + "name="+ name_special_id + " " + "value="+ name_special + " > ";
	         if(  count_element >= rowIndex_pack)
		   {
		   		
		   		//alert("actulizo");

		   		$('#' + name_pack_id).remove();
		   		$('#' + name_special_id).remove();
		   		var pos = rowIndex_pack - 1;  
				 var ubication = "prices_pack_hidden :eq(" + pos + ")";
				 //$('#prices_age tr:eq(0)').after(row);
				  $('#'+ubication).before('<p>' + input_min + input_max  + '</p>');

		   } 
		   else{

	       		$("#prices_pack_hidden").append('<p>' + input_min + input_max  + '</p>');
	       		rowCount = $('#pack_special tr').length;
  		   		$("#rows_special").val(rowCount-2);
	       
	       }
	       
        
	        } // end else

    }
);  

	// event edit prices pack

	$("#pack_special").on('click','button#editar_price_pack',function(event){


        event.preventDefault(); 
        var rowIndex_pack_edit = ($(this).closest('td').parent()[0].sectionRowIndex);
        $("#pack_special tr").eq(rowIndex_pack_edit).remove();
        // create tr

  var name_pack = 'pack'+ rowIndex_pack_edit;
  var name_special = 'special'+ rowIndex_pack_edit;
  var value_name_pack = $('#' + name_pack).val();
  var value_name_special = $('#' + name_special).val();
  var input_min = "<td>"+ "<input type='text' " +  "id="+name_pack + " " + "name="+ name_pack +  " "+ "value="+  value_name_pack + " size='12'> " + "</td>"
  var input_max = "<td>"+ "<input type='text' " + "id="+name_special + " " + "name="+ name_special +  " "+ "value="+  value_name_special + " size='12'> " + "</td>"
  var row_pack =  "<tr>" + input_min + input_max + 
                    "<td>"+ "<button type='button' id = 'listo_price_pack' class='btn btn-xs btn-primary'>Done</button> "
                    + "<button type='button' id = 'eliminar_price_pack' class='btn btn-xs btn-danger'>delete</button>"
                    + '</td>' + '</tr>'	

  var pos = rowIndex_pack_edit;
  
  var ubication = "pack_special tr:eq(" + pos + ")";
 //$('#prices_age tr:eq(0)').after(row);
  $('#'+ubication).before(row_pack);       

	
    });



	// click button delete add event

	$("#pack_special").on('click','button#eliminar_price_pack',function(event){


        event.preventDefault();        
        var rowIndex2 = ($(this).closest('td').parent()[0].sectionRowIndex);
        $("#pack_special tr").eq(rowIndex2).remove();
        $("#prices_pack_hidden p").eq(rowIndex2 - 1 ).remove();
        rowCount = $('#pack_special tr').length;
  		$("#rows_special").val(rowCount-2);

	
    });

});

