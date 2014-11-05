$(document).ready(function() { 



    $("#show_images").on('click','a.add_image_div',function(event){


        event.preventDefault();
        $(this).parent('p').remove(); 
        var cont =  $("#cont_img").val();
        $("#cont_img").val(cont--);

    }
);
		
            $('#photoimg').on('change', function()			{ 
			$("#preview").html('');
		    $("#preview").html('<img src="loader.gif" alt="Uploading...."/>');
		var inputFileImage = document.getElementById("photoimg");
		var file = inputFileImage.files[0];
		var picture = new FormData();
		picture.append('photoimg',file);

        $.ajax({  
             type: "POST",  
             url: "classes/Upload_img.php",
             data: picture,
             async: false,
             cache: false,
             contentType: false,
             processData: false,
             success: function(data) {

             	 $("#preview").empty();
             	 $("#name_img").val(data);

                 var pathname = window.location.pathname;
                 path = "tmp/"+data;
                 pathname+= path;
                 var radio_valor =  "value = " + data;
                 element ="<p> <img src="+ pathname + "> &nbsp;&nbsp;<label>  Is cover </label> &nbsp;&nbsp;<input type= 'radio' name = 'is_cover' "+ radio_valor + "> &nbsp;&nbsp; <a href ='#' class= 'add_image_div' ><span class='glyphicon glyphicon-trash'></span> </a> </p>" 
                 $("#show_images").append(element);
             	 $("#preview").html("image Uploaded");
             	 
                  var cont = $("#name_img_div input").size();
                  cont++;
                  var name_img = "name = name_img" + cont;
                  var valor = "value = " + data;
                  var input = "<input type='hidden' " + name_img + " "+ valor + ">";
                  $("#name_img_div").append(input);
                  $("#cont_img").val(cont);
                  

             }
        }); 
        return false;		  
			
		
			});
        }); 