 $(document).ready(function(){
        $("#language").change(function(event){
            var id = $("#language").find(':selected').val();
            var id_text = $("#language").find(':selected').text();
            //id_text.replace(/\s/g,'');
            //console.log(id_text);

            $.ajax({
			
			url: "classes/Topics.php", 
			data: {id_city:id},
			type: "POST",
			async: false,
			//datatype: 'json',
			success: function(data){
				
				$("#topics").html(data);
				
				if( /spanish/.test(id_text) )
				{
					$("#topics_en").empty();
					$("#topics_en").append("<strong> Tema </strong>");
					$("#price_observation_en").empty();
					$("#price_observation_en").append("<strong> Observaciones de los Precios </strong>");
					$("#brief_description_en").empty();
					$("#brief_description_en").append("<strong> Breve descripci&oacute;n </strong>");
					$("#description_en").empty();
					$("#description_en").append("<strong> Descripci&oacute;n </strong>");
					//name_en
					$("#name_en").empty();
					$("#name_en").append("<strong> Nombre del Evento </strong>");
					// city_en
					$("#city_en").empty();
					$("#city_en").append("<strong> Ciudad</strong>");
					// category_en
					$("#category_en").empty();
					$("#category_en").append("<strong> Categoria</strong>");
					//filters_en
					$("#filters_en").empty();
					$("#filters_en").append("<strong> Filtros</strong>");
					//b_date_en
					$("#b_date_en").empty();
					$("#b_date_en").append("<strong> Fecha inicio</strong>");
					//e_date_en
					$("#e_date_en").empty();
					$("#e_date_en").append("<strong> Fecha fin</strong>");
					//notes_en
					$("#notes_en").empty();
					$("#notes_en").append("<strong> Notas</strong>");
					//schedule_en
					$("#schedule_en").empty();
					$("#schedule_en").append("<strong> Calendario por d&iacute;</strong>");
					//prices_en
					$("#prices_en").empty();
					$("#prices_en").append("<strong> Precios </strong>");
					//ages_en
					$("#ages_en").empty();
					$("#ages_en").append("<strong> Precios por edades </strong>");
					//special_en
					$("#special_en").empty();
					$("#special_en").append("<strong> Precios especiales </strong>");

				}
				else
					if(/english/.test(id_text))
					{

					$("#topics_en").empty();
					$("#topics_en").append("<strong> Topics </strong>");
					$("#price_observation_en").empty();
					$("#price_observation_en").append("<strong>Price observation </strong>");
					$("#brief_description_en").empty();
					$("#brief_description_en").append("<strong> Brief description </strong>");
					$("#description_en").empty();
					$("#description_en").append("<strong> Description </strong>");
					//name_en
					$("#name_en").empty();
					$("#name_en").append("<strong> Event's Name </strong>");
					// city_en
					$("#city_en").empty();
					$("#city_en").append("<strong> City </strong>");
					// category_en
					$("#category_en").empty();
					$("#category_en").append("<strong> Category</strong>");
					//filters_en
					$("#filters_en").empty();
					$("#filters_en").append("<strong> Filters</strong>");
					//b_date_en
					$("#b_date_en").empty();
					$("#b_date_en").append("<strong> Beginning date:</strong>");
					//e_date_en
					$("#e_date_en").empty();
					$("#e_date_en").append("<strong> Ending date:</strong>");
					//notes_en
					$("#notes_en").empty();
					$("#notes_en").append("<strong> Notes</strong>");
					//schedule_en
					$("#schedule_en").empty();
					$("#schedule_en").append("<strong> Schedules of each day</strong>");
					//prices_en
					$("#prices_en").empty();
					$("#prices_en").append("<strong> Prices </strong>");
					//ages_en
					$("#ages_en").empty();
					$("#ages_en").append("<strong> Prices by ages: </strong>");
					//special_en
					$("#special_en").empty();
					$("#special_en").append("<strong>  Special Prices </strong>");






					}
			},
			error: function(){
				alert("failure");
			}		
		});
            
        });
    });