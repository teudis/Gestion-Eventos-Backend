$("ul.dropdown-menu a").on('click',function(event){

	event.preventDefault();
	var city  = $(this).attr('href');
	 $.ajax({
      
          url: "classes/Select_City.php", 
          data: {city:city},
          type: "POST",
          async: false,
          //dataType: "JSON",
          success: function(data){
            
            
          	if(data=="No results")
          	{

          		$("#table_all").empty();
          		//$("#table_city").empty();
          		$("#table_all").append(data);

          	}
          	else
          	{
          		$("#table_all").empty();
          		//$("#table_city").empty();
          		$("#table_all").append(data);


          	}


          },
          error: function(){
            alert("failure");
          }   
        });
 


});