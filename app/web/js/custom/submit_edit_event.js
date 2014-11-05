$(document).ready(function () {
	$("input#submit_edit").click(function(){		

		$.ajax({
			
			url: "classes/EditEvent.php", 
			data: $('form.edit_event').serialize(),
			type: "POST",
			async: false,
			success: function(msg){
				
				$("#edit_modal").modal('hide');
				alert(msg);	
				$('.edit_event')[0].reset();
				location.reload();
			},
			error: function(){
				alert("failure");
			}		
		});

	
	});
});
    

