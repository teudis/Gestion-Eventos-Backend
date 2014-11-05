$(document).ready(function () {
	$("input#submit").click(function(){

		var vname = validate_blank_name();
		var vdate = validate_date();
		var vcity =  validate_city();
		var vfilter = validate_filters(); 
		var vcategory = validate_category();
		var vlanguage = validate_language();
		var vtopic = validate_topics();



		if (vtopic != true) {

			$("#errors").html(vtopic);
			$("#errors").show();

		} else


		if (vlanguage != true) {


			$("#errors").html(vlanguage);
			$("#errors").show();

		} else	
		if( vname != true)
		{
			$("#errors").html(vname);
			$("#errors").show();
			
		}
		else
		 if	(vdate!= true)
		 {

		 	$("#errors").html(vdate);
			$("#errors").show();
		 }
		 else 
		 	if(vcity!= true)
		 	{

		 		$("#errors").html(vcity);
				$("#errors").show();
		 	}
		 	else if(vfilter != true)
		 	{

		 		$("#errors").html(vfilter);
				$("#errors").show();
		 	}
		 	else if (vcategory != true) {

		 		$("#errors").html(vcategory);
				$("#errors").show();

		 	}

		 	else
		 	{
	
		$.ajax({
			
			url: "classes/AddEvent.php", 
			data: $('form.add_event').serialize(),
			type: "POST",
			async: false,
			success: function(msg){
				
				$("#myModal").modal('hide');
				alert(msg);	
				$('.edit_event')[0].reset();
				location.reload();
			},
			error: function(){
				alert("failure");
			}		
		});

	} // end send ajax
	});
});
    

function validate_blank_name ()
{

	if($("#name_event").val() == "" || $("#name_event").val()==null)
	{

		return "El campo event name is empty";

	}  

	else 
		return true;
} 


function validate_date()
{
	var fecha = $('#datepicker1').val();
    var end_fecha = $('#datepicker2').val();
    if (fecha == "" || end_fecha == "") {

    	return "Verify field date beginning o field date ending";

    }
    else
    	 if((Date.parse(fecha)) > (Date.parse(end_fecha)) )
    	 {


    	 	return "Beginning date is older than endinng date";

    	 }

    	 else
    	 	return true;
  }   



  function validate_city()
  {

  	var city = $('#city').val();
  	if (city=="") {

  		return "Select City please";
  	}
  	else
  		 return true;

  }

  function validate_topics()
  {

  	var topics = $('#topics').val();
  	if (topics == "") {

  		return "Select Topic please";
  	}
  	else
  		 return true;


  }

  function validate_category()
  {

  	var city = $('#content_to_city').val();
  	if (city == "") {

  		return "Select Category please";
  	}
  	else
  		 return true;



  }

  function validate_language()
  {


  	var language = $('#language').val();
  	if (language == "") {

  		return "Select Language please";
  	}
  	else
  		 return true;
  }


  function validate_filters()
  {
  		
  		 if($("#Outdoor").is(':checked'))
  		 {

  		 	return true;
  		 }
  		 else if ( $("#Formal_Dressed").is(':checked')) {

				return true;

			}
			else 

			if ($("#Kinds_Family").is(':checked')) {

				return true;

			}

			else 

				if ($("#NigthLife").is(':checked')) {

				return true;

			}
			else
				return "Select one filter";
  }