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
				var place = " <br/><strong>Places </strong>";
				var subcategory = " <br />  <strong> Subcategory: </strong> " + filtro.subcategory
				 $(".the-return").empty();
				 $(".the-return").append( place);
				 $(".the-return").append( info_title);
				 $(".the-return").append( subcategory);
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