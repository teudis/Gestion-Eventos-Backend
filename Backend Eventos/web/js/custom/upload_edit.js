$(document).ready(function() { 


	
      $('#edit_photoimg').on('change', function()			{ 
			$("#edit_preview").html('');
		  $("#edit_preview").html('<img src="loader.gif" alt="Uploading...."/>');
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
                 element ="<p> <img src="+ pathname + "> &nbsp;&nbsp; &nbsp;&nbsp;<input type= 'radio' name = 'edit_cover' "+ radio_valor + "> &nbsp;&nbsp; <a href ='#' class= 'remove_image_div' ><span class='glyphicon glyphicon-trash'></span> </a> </p>" 
                 $("#edit_show_images").append(element);
             	   $("#edit_preview").html("image Uploaded");
                 $("#edit_name_img_div").empty();
                 var name_img = "name = edit_name_img" + 1;
                 var valor = "value = " + data;                  
                 var input = "<input type='hidden' " + name_img + " "+ valor + ">";
                 $("#edit_name_img_div").append(input);
                 $("#edit_cont_img").val(1);
                 $("#edit_upload_img").hide();
                  

             }
        }); 
        return false;		  
			
		
			});
        }); 