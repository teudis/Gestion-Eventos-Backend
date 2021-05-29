 $(document).ready(function(){
        $("#edit_content_to_city").change(function(event){
            var id = $("#edit_content_to_city").find(':selected').val();

            $.ajax({
			
			url: "classes/Category.php", 
			data: {id_category:id},
			type: "POST",
			async: false,
			dataType: "JSON",
			success: function(filtro){
				
				
				var title = filtro.title_category;
				var lat = filtro.lat;
				var lng = filtro.lng;				
				
				var  info_title = " <br/><strong>Title: </strong> " + title ;
				var info_lat = "<br /> <strong>Lat: </strong> "  + lat ;
				var info_lng = " <br />  <strong>Lng: </strong> "  + lng ;
				$(".edit_the-return").empty();
				 $(".edit_the-return").append( info_title);
				 $(".edit_the-return").append( info_lat);
				 $(".edit_the-return").append( info_lng);

				 // guarda info 

				 $("#edit_lat").val(lat);
				 $("#edit_lng").val(lng);
				 $("#edit_dir_alternative").show();



			},
			error: function(){
				alert("failure");
			}		
		});
            
        });
    });