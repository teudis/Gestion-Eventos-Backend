 $(document).ready(function(){
        $("#language").change(function(event){
            var id = $("#language").find(':selected').val();

            $.ajax({
			
			url: "classes/Topics.php", 
			data: {id_city:id},
			type: "POST",
			async: false,
			//datatype: 'json',
			success: function(data){
				
				$("#topics").html(data);
			},
			error: function(){
				alert("failure");
			}		
		});
            
        });
    });