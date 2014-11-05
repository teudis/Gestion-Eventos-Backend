$(document).ready(function() { 


	
            $('#edit_photoimg').on('change', function()			{ 
			$("#preview").html('');
		    $("#preview").html('<img src="loader.gif" alt="Uploading...."/>');
		var inputFileImage = document.getElementById("edit_photoimg");
		var file = inputFileImage.files[0];
		var picture = new FormData();
		picture.append('edit_photoimg',file);

        $.ajax({  
             type: "POST",  
             url: "classes/EditUpload_img.php",
             data: picture,
             async: false,
             cache: false,
             contentType: false,
             processData: false,
             success: function(data) {

             	 $("#edit_preview").empty();   
                         	 

                 var pathname = window.location.pathname;
                 path = "tmp/"+data;
                 pathname+= path;
                 var radio_valor =  "value = " + data;
                 element ="<p> <img src="+ pathname + "> &nbsp;&nbsp;<label>  Is cover </label> &nbsp;&nbsp;<input type= 'radio' name = 'edit_cover' "+ radio_valor + "> &nbsp;&nbsp; <a href ='#' class= 'add_image_div' ><span class='glyphicon glyphicon-trash'></span> </a> </p>" 
                 $("#edit_show_images").append(element);
             	 $("#edit_preview").html("image Uploaded");
             	 
                  var cont = $("#edit_name_img_div input").size();
                  cont++;
                  var name_img = "name = edit_name_img" + cont;
                  var valor = "value = " + data;                  
                  var input = "<input type='hidden' " + name_img + " "+ valor + ">";
                  $("#edit_name_img_div").append(input);
                  $("#edit_cont_img").val(cont);
                  

             }
        }); 
        return false;		  
			
		
			});
        }); 