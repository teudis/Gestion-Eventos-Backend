$(document).ready(function() { 



    $("#show_images").on('click','a.add_image_div',function(event){


        event.preventDefault();
        $(this).parent('p').remove();        
        $("#cont_img").val(0);
        $("#upload_img").show();
        $("#preview").empty();

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
                 element ="<p> <img src="+ pathname + "> &nbsp;&nbsp; &nbsp;&nbsp; <a href ='#' class= 'add_image_div' ><span class='glyphicon glyphicon-trash'></span> </a> </p>" 
                 $("#show_images").append(element);
             	 $("#preview").html("image Uploaded");
             	 $("#name_img_div").empty();                 
                 var name_img = "name = name_img" + 1;
                 var valor = "value = " + data;
                 var input = "<input type='hidden' " + name_img + " "+ valor + ">";
                 $("#name_img_div").append(input);
                 $("#cont_img").val(1);
                 $("#upload_img").hide();
                  

             }
        }); 
        return false;		  
			
		
			});
        }); 