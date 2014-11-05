$(document).ready(function() { 



// click button done


$("#table_sunday").on('click','button#listo_sunday',function(event){


        event.preventDefault();
        var rowCount = $('#table_sunday tr').length;
        rowCount = rowCount - 1;
        var rowIndex_sunday = ($(this).closest('td').parent()[0].sectionRowIndex);
        // crear tr
        
        var id = rowCount - 1;
  		var name_pack = "b_sunday"+ id;  		
  		name_pack = $('#'+ name_pack).val();
  		var name_special = 'e_sunday'+ id;
  		name_special = $('#'+ name_special).val();
      var date_sunday = "date_sunday" + id;
  		date_sunday = $('#'+ date_sunday).val();
  		if(name_pack == "" || name_special =="")
  		{

  			alert("Must insert values into dates ");
			

  		}
       else{
  
		  var input_min = "<td>"+ name_pack + "</td>"
		  var input_max = "<td>"+  name_special  + "</td>"
      var input_date =  "<td>"+  date_sunday  + "</td>"

		   var count_element_sunday = $("#rows_sunday").val();
  		 var row =  "<tr>" + input_min + input_max + input_date +
                    "<td>"+ "<button type='button' id = 'editar_sunday' class='btn btn-xs btn-primary'>edit</button> "
                    + "<button type='button' id = 'eliminar_sunday' class='btn btn-xs btn-danger'>delete</button>"
                    + '</td>' + '</tr>'
	        $("#table_sunday tr").eq(rowIndex_sunday).remove();
	          var pos = rowIndex_sunday;
	         var ubication_sunday = "table_sunday tr:eq(" + pos + ")";
	        //$('#prices_age tr:eq(0)').after(row);
	        $('#'+ubication_sunday).before(row);
	        // add input 

	        name_pack_id = "b_sunday" + id;
	        name_special_id = 'e_sunday' + id;
          name_date_id = 'date_sunday' + id;
	             

	       var input_min = "<input type='hidden' " +  "id="+ name_pack_id + " " + "name="+ name_pack_id + " "+ "value=" + name_pack + " > ";
	       var input_max = "<input type='hidden' " +  "id="+ name_special_id + " " + "name="+ name_special_id + " " + "value="+ name_special + " > ";
         var input_date_sunday = "<input type='hidden' " +  "id="+ name_date_id + " " + "name="+ name_date_id + " " + "value="+ date_sunday + " > ";
	         if(  count_element_sunday >= rowIndex_sunday)
		   {
		   		
		   		//alert("actulizo");

		   		$('#' + name_pack_id).remove();
		   		$('#' + name_special_id).remove();
          $('#' +  name_date_id).remove();
		   		var pos = rowIndex_sunday - 1;  
				 var ubication_sunday = "sunday_hidden :eq(" + pos + ")";
				 //$('#prices_age tr:eq(0)').after(row);
				  $('#'+ubication_sunday).before('<p>' + input_min + input_max + input_date_sunday + '</p>');

		   } 
		   else{

	       		$("#sunday_hidden").append('<p>' + input_min + input_max + input_date_sunday  + '</p>');
	       		rowCount = $('#table_sunday tr').length;
  		   		$("#rows_sunday").val(rowCount-2);
	       
	       }
	       
        
	        } // end else

    }
);  

	// event edit prices pack

	$("#table_sunday").on('click','button#editar_sunday',function(event){


        event.preventDefault(); 
        var rowIndex_sunday_edit = ($(this).closest('td').parent()[0].sectionRowIndex);
        $("#table_sunday tr").eq(rowIndex_sunday_edit).remove();
        // create tr

  var name_pack = 'b_sunday'+ rowIndex_sunday_edit;
  var name_special = 'e_sunday'+ rowIndex_sunday_edit;
  var date_sunday = 'date_sunday' + rowIndex_sunday_edit;
  var value_name_pack = $('#' + name_pack).val();
  var value_name_special = $('#' + name_special).val();
  var value_date_sunday = $('#' + date_sunday).val();
  var input_min = "<td>"+ "<input type='text' " +  "id="+name_pack + " " + "name="+ name_pack +  " "+ "value="+  value_name_pack + " size='12'> " + "</td>"
  var input_max = "<td>"+ "<input type='text' " + "id="+name_special + " " + "name="+ name_special +  " "+ "value="+  value_name_special + " size='12'> " + "</td>"
  var select  = "" ;
  var select_full_sunday = "" ;
  $('#select_sunday p').each(function(){
         var content = $(this).text();
        
         if(content != "")
         {

           console.log(content);
          select += "<option value='"+ content+"'>"+ content +"</option>";

         }

        select_full_sunday = "<select class='form-control' " + "name=" + date_sunday + " id=" + date_sunday + " >" + select + " </select>";
         
              
        }); 
  var input_select = "<td>"+  select_full_sunday  + "</td>";
  var row_pack =  "<tr>" + input_min + input_max + input_select 
                    +
                    "<td>"+ "<button type='button' id = 'listo_sunday' class='btn btn-xs btn-primary'>Done</button> "
                    + "<button type='button' id = 'eliminar_sunday' class='btn btn-xs btn-danger'>delete</button>"
                    + '</td>' + '</tr>'	

  var pos = rowIndex_sunday_edit;
  
  var ubication_sunday = "table_sunday tr:eq(" + pos + ")";
 //$('#prices_age tr:eq(0)').after(row);
  $('#'+ubication_sunday).before(row_pack);       
  $('#' + date_sunday).val(value_date_sunday);
	
    });



	// click button delete add event

	$("#table_sunday").on('click','button#eliminar_sunday',function(event){


        event.preventDefault();        
        var rowIndex2 = ($(this).closest('td').parent()[0].sectionRowIndex);
        $("#table_sunday tr").eq(rowIndex2).remove();
        $("#sunday_hidden p").eq(rowIndex2 - 1 ).remove();
        rowCount = $('#table_sunday tr').length;
  		  $("#rows_sunday").val(rowCount-2);

	
    });

});

