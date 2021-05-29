 $(document).ready(function(){
        $("#city").change(function(event){
            var id = $("#city").find(':selected').val();

            $.ajax({
			
			url: "classes/Select.php", 
			data: {id_city:id},
			type: "POST",
			async: false,
			//datatype: 'json',
			success: function(data){
				
				$("#content_to_city").html(data);
			},
			error: function(){
				alert("failure");
			}		
		});
            
        });
    });