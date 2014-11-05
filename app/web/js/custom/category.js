 $(document).ready(function(){
        $("#content_to_city").change(function(event){
            var id = $("#content_to_city").find(':selected').val();

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
				 $(".the-return").append( info_title);
				 $(".the-return").append( info_lat);
				 $(".the-return").append( info_lng);

				 // guarda info 

				 $("#lat").val(lat);
				 $("#lng").val(lng);
				 $("#dir_alternative").show();



			},
			error: function(){
				alert("failure");
			}		
		});
            
        });
    });