 $(document).ready(function(){
        $("#edit_city").change(function(event){
            var id = $("#edit_city").find(':selected').val();

            $.ajax({
			
			url: "classes/Select.php", 
			data: {id_city:id},
			type: "POST",
			async: false,
			//datatype: 'json',
			success: function(data){
				
				$("#edit_content_to_city").html(data);
			},
			error: function(){
				alert("failure");
			}		
		});
            
        });
    });