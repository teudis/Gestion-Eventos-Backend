$(document).ready(function() { 



// click button done

$("#edit_prices_age").on('click','button#editar_listo_price_age',function(event){


        event.preventDefault();
        var rowCount = $('#edit_prices_age tr').length;
        rowCount = rowCount - 1;
        var rowIndex = ($(this).closest('td').parent()[0].sectionRowIndex);
        // crear tr
        
        var id = rowCount - 1;
  		var name_min = "edit_min" + id;
  		name_min = $('#'+ name_min).val();
  		var name_max = 'edit_max'+ id;
  		name_max = $('#'+ name_max).val();
  		var name_price = 'edit_price'+ id; 
  		name_price = $('#'+ name_price).val();
  		if(name_min == "" || name_max=="" || name_price == "" )
  		{

  			alert("Must insert values into Table prices by ages");
			

  		}
       else{
  
		  var input_min = "<td>"+ name_min + "</td>"
		  var input_max = "<td>"+  name_max  + "</td>"
		  var input_price = "<td>"+  name_price  + "</td>"
  
  		 var row =  "<tr>" + input_min + input_max + input_price
                    +
                    "<td>"+ "<button type='button' id = 'editar_price_age_edit' class='btn btn-xs btn-primary'>edit</button> "
                    + "<button type='button' id = 'editar_eliminar_price_age' class='btn btn-xs btn-danger'>delete</button>"
                    + '</td>' + '</tr>'
	        $("#edit_prices_age tr").eq(rowIndex).remove();
	          var pos = rowIndex;
	         var ubication = "edit_prices_age tr:eq(" + pos + ")";
	        //$('#prices_age tr:eq(0)').after(row);
	        $('#'+ubication).before(row);
	        // add input 

	        name_min_id = "edit_min" + id;
	        name_max_id = 'edit_max' + id;
	        name_price_id = 'edit_price' + id; 

	       var input_min = "<input type='hidden' " +  "id="+ name_min_id + " " + "name="+ name_min_id + " "+ "value=" + name_min + " > ";
	       var input_max = "<input type='hidden' " +  "id="+ name_max_id + " " + "name="+ name_max_id + " " + "value="+ name_max + " > ";
	       var input_price = "<input type='hidden' " + "id="+ name_price_id + " " + "name="+ name_price_id+ " " + "value="+ name_price + " > " ;
         var count_element_ages = $("#edit_rows_ages").val();
         if(  count_element_ages >= rowIndex)
         {

          $('#' + name_min_id).remove();
          $('#' + name_max_id).remove();
          $('#' + name_price_id).remove();
          var pos = rowIndex - 1;  
         var ubication = "edit_prices_ages_hidden :eq(" + pos + ")";
         //$('#prices_age tr:eq(0)').after(row);
          $('#'+ubication).before('<p>' + input_min + input_max + input_price  + '</p>');



         }
         else
         {
	           $("#edit_prices_ages_hidden").append('<p>' + input_min + input_max + input_price + '</p>');
	           rowCount = $('#edit_prices_age tr').length;
  			     $("#edit_rows_ages").val(rowCount-2);
         }
      
	        } // end else

    }
);  

	// event edit prices by ages

	$("#edit_prices_age").on('click','button#editar_price_age_edit',function(event){


        event.preventDefault(); 
        var rowIndex3 = ($(this).closest('td').parent()[0].sectionRowIndex);
        $("#edit_prices_age tr").eq(rowIndex3).remove();
        // create tr

  var name_max = 'edit_max'+ rowIndex3;
  var name_min = 'edit_min'+ rowIndex3;
  var name_price = 'edit_price'+ rowIndex3;
  var value_name_min = $('#' + name_min).val();
  var value_name_max = $('#' + name_max).val();
  var value_name_price = $('#' + name_price).val();
  var input_min = "<td>"+ "<input type='text' " +  "id="+name_min + " " + "name="+ name_min +  " "+ "value="+  value_name_min + " size='12'> " + "</td>"
  var input_max = "<td>"+ "<input type='text' " + "id="+name_max + " " + "name="+ name_max +  " "+ "value="+  value_name_max + " size='12'> " + "</td>"
  var input_price = "<td>"+ "<input type='text' " + "id="+name_price + " " + "name="+ name_price +  " "+ "value="+  value_name_price + " size='12'> " + "</td>"
  
  var row =  "<tr>" + input_min + input_max + input_price
                    +
                    "<td>"+ "<button type='button' id = 'editar_listo_price_age' class='btn btn-xs btn-primary'>Done</button> "
                    + "<button type='button' id = 'editar_eliminar_price_age' class='btn btn-xs btn-danger'>delete</button>"
                    + '</td>' + '</tr>'	

  var pos = rowIndex3;
  var ubication = "edit_prices_age tr:eq(" + pos + ")";
 //$('#prices_age tr:eq(0)').after(row);
  $('#'+ubication).before(row);       

	
    });



	// click button delete add event

	$("#edit_prices_age").on('click','button#editar_eliminar_price_age',function(event){


        event.preventDefault();        
        var rowIndex2 = ($(this).closest('td').parent()[0].sectionRowIndex);
        $("#edit_prices_age tr").eq(rowIndex2).remove();
        $("#edit_prices_ages_hidden p").eq(rowIndex2 - 1 ).remove();
        rowCount = $('#edit_prices_age tr').length;
  		$("#edit_rows_ages").val(rowCount-2);

	
    });

});

