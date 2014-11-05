$(document).ready(function () {

$("input#submit_remove").click(function(){

		var id = $("#id_event").val();
		$.ajax({
			
			url: "classes/RemoveEvent.php", 
			data: {id:id},
			type: "POST",
			async: false,
			success: function(msg){
				
				$("#remove_modal").modal('hide');
				alert(msg);	
				location.reload();
			},
			error: function(){
				alert("failure");
			}		
		});
		



		});

	});