$(document).ready(function() { 



// click button done


$("#table_thurday").on('click','button#listo_thurday',function(event){


        event.preventDefault();
        var rowCount = $('#table_thurday tr').length;
        rowCount = rowCount - 1;
        var rowIndex_thurday = ($(this).closest('td').parent()[0].sectionRowIndex);
        // crear tr
        
        var id = rowCount - 1;
  		var name_pack = "b_thurday"+ id;  		
  		name_pack = $('#'+ name_pack).val();
  		var name_special = 'e_thurday'+ id;
  		name_special = $('#'+ name_special).val();
      var date_thurday = "date_thurday" + id;
  		date_thurday = $('#'+ date_thurday).val();
  		if(name_pack == "" || name_special =="")
  		{

  			alert("Must insert values into dates ");
			

  		}
       else{
  
		  var input_min = "<td>"+ name_pack + "</td>"
		  var input_max = "<td>"+  name_special  + "</td>"
      var input_date =  "<td>"+  date_thurday  + "</td>"

		   var count_element_thurday = $("#rows_thurday").val();
  		 var row =  "<tr>" + input_min + input_max + input_date +
                    "<td>"+ "<button type='button' id = 'editar_thurday' class='btn btn-xs btn-primary'>edit</button> "
                    + "<button type='button' id = 'eliminar_thurday' class='btn btn-xs btn-danger'>delete</button>"
                    + '</td>' + '</tr>'
	        $("#table_thurday tr").eq(rowIndex_thurday).remove();
	          var pos = rowIndex_thurday;
	         var ubication_thurday = "table_thurday tr:eq(" + pos + ")";
	        //$('#prices_age tr:eq(0)').after(row);
	        $('#'+ubication_thurday).before(row);
	        // add input 

	        name_pack_id = "b_thurday" + id;
	        name_special_id = 'e_thurday' + id;
          name_date_id = 'date_thurday' + id;
	             

	       var input_min = "<input type='hidden' " +  "id="+ name_pack_id + " " + "name="+ name_pack_id + " "+ "value=" + name_pack + " > ";
	       var input_max = "<input type='hidden' " +  "id="+ name_special_id + " " + "name="+ name_special_id + " " + "value="+ name_special + " > ";
         var input_date_thurday = "<input type='hidden' " +  "id="+ name_date_id + " " + "name="+ name_date_id + " " + "value="+ date_thurday + " > ";
	         if(  count_element_thurday >= rowIndex_thurday)
		   {
		   		
		   		//alert("actulizo");

		   		$('#' + name_pack_id).remove();
		   		$('#' + name_special_id).remove();
          $('#' +  name_date_id).remove();
		   		var pos = rowIndex_thurday - 1;  
				 var ubication_thurday = "thurday_hidden :eq(" + pos + ")";
				 //$('#prices_age tr:eq(0)').after(row);
				  $('#'+ubication_thurday).before('<p>' + input_min + input_max + input_date_thurday + '</p>');

		   } 
		   else{

	       		$("#thurday_hidden").append('<p>' + input_min + input_max + input_date_thurday  + '</p>');
	       		rowCount = $('#table_thurday tr').length;
  		   		$("#rows_thurday").val(rowCount-2);
	       
	       }
	       
        
	        } // end else

    }
);  

	// event edit prices pack

	$("#table_thurday").on('click','button#editar_thurday',function(event){


        event.preventDefault(); 
        var rowIndex_thurday_edit = ($(this).closest('td').parent()[0].sectionRowIndex);
        $("#table_thurday tr").eq(rowIndex_thurday_edit).remove();
        // create tr

  var name_pack = 'b_thurday'+ rowIndex_thurday_edit;
  var name_special = 'e_thurday'+ rowIndex_thurday_edit;
  var date_thurday = 'date_thurday' + rowIndex_thurday_edit;
  var value_name_pack = $('#' + name_pack).val();
  var value_name_special = $('#' + name_special).val();
  var value_date_thurday = $('#' + date_thurday).val();
  var input_min = "<td>"+ "<input type='text' " +  "id="+name_pack + " " + "name="+ name_pack +  " "+ "value="+  value_name_pack + " size='12'> " + "</td>"
  var input_max = "<td>"+ "<input type='text' " + "id="+name_special + " " + "name="+ name_special +  " "+ "value="+  value_name_special + " size='12'> " + "</td>"
  var select  = "" ;
  var select_full_thurday = "" ;
  $('#select_thurday p').each(function(){
         var content = $(this).text();
        
         if(content != "")
         {

           console.log(content);
          select += "<option value='"+ content+"'>"+ content +"</option>";

         }

        select_full_thurday = "<select class='form-control' " + "name=" + date_thurday + " id=" + date_thurday + " >" + select + " </select>";
         
              
        }); 
  var input_select = "<td>"+  select_full_thurday  + "</td>";
  var row_pack =  "<tr>" + input_min + input_max + input_select 
                    +
                    "<td>"+ "<button type='button' id = 'listo_thurday' class='btn btn-xs btn-primary'>Done</button> "
                    + "<button type='button' id = 'eliminar_thurday' class='btn btn-xs btn-danger'>delete</button>"
                    + '</td>' + '</tr>'	

  var pos = rowIndex_thurday_edit;
  
  var ubication_thurday = "table_thurday tr:eq(" + pos + ")";
 //$('#prices_age tr:eq(0)').after(row);
  $('#'+ubication_thurday).before(row_pack);       
  $('#' + date_thurday).val(value_date_thurday);
	
    });



	// click button delete add event

	$("#table_thurday").on('click','button#eliminar_thurday',function(event){


        event.preventDefault();        
        var rowIndex2 = ($(this).closest('td').parent()[0].sectionRowIndex);
        $("#table_thurday tr").eq(rowIndex2).remove();
        $("#thurday_hidden p").eq(rowIndex2 - 1 ).remove();
        rowCount = $('#table_thurday tr').length;
  		  $("#rows_thurday").val(rowCount-2);

	
    });

});

