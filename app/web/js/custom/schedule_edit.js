$('#edit_datepicker2').datepicker({
    dateFormat: 'yy-mm-dd',
    onSelect: function() {
         check_datepicker_edit();
    }
}); 
    
      
     function check_datepicker_edit(){

      $("#select_monday_edit").empty();
      $("#select_tuesday_edit").empty();
      $("#select_weds_edit").empty();
      $("#select_thurday_edit").empty();
      $("#select_friday_edit").empty();
      $("#select_saturday_edit").empty();
      $("#select_sunday_edit").empty(); 
      $("#select_monday_edit").empty();
      // show table
       $("#time_monday_edit").show();
       $("#time_tuesday_edit").show();
       $("#time_weds_edit").show();
       $("#time_thurday_edit").show();
       $("#time_friday_edit").show();
       $("#time_saturday_edit").show();
       $("#time_sunday_edit").show();

       $("#rows_monday_edit").val(0);
       $("#monday_edit_hidden").empty();
       $("#rows_tuesday_edit").val(0);
       $("#tuesday_edit_hidden").empty();
       $("#rows_weds_edit").val(0);
       $("#weds_edit_hidden").empty();
       $("#rows_thurday_edit").val(0);
       $("#thurday_edit_hidden").empty();
       $("#rows_friday_edit").val(0);
       $("#friday_edit_hidden").empty();
       $("#rows_saturday_edit").val(0);
       $("#saturday_edit_hidden").empty();
       $("#rows_sunday_edit").val(0);
       $("#sunday_edit_hidden").empty();
       

      var fecha = $('#edit_datepicker1').val();
      var end_fecha = $('#edit_datepicker2').val();

      var control = false;
      if ((Date.parse(fecha)) < (Date.parse(end_fecha)) ) {


      		control = true;

      }
        
      if (fecha != "" && end_fecha !=""  && control) {       

      var fechaf = fecha.split('-');
      var year = fechaf[0];
      var month = fechaf[1];
      var day = fechaf [2];
      var cont = 0;
      var fechas =  new Array();
      var valor = fecha;
      var current_date = new Date(year,month-1,day);
       var end_fechaf = end_fecha.split('-');
       var end_year = end_fechaf[0];
       var end_month = end_fechaf[1];
       var end_day = end_fechaf[2];
       var last_fecha = new Date(end_year,end_month-1,end_day)
       

        var year_result = current_date.getFullYear();
        var month_result = current_date.getMonth()+ 1 ;
        var day_result = current_date.getDate();
        var result = year_result + '-'+ month_result + '-'+day_result;
        fechas[0] = result;


        var cont = 1 ;        
        while (current_date < last_fecha )
        {

          var sumarDias=parseInt(1);
          //console.log(cont);
          current_date.setDate(current_date.getDate() + sumarDias);
          var year_result = current_date.getFullYear();
          var month_result = current_date.getMonth()+ 1 ;
          var day_result = current_date.getDate();
          var result = year_result + '-'+ month_result + '-'+day_result;
          fechas[cont] = result;
          cont++;

        }

       //alert(fechas.toString());
       var select_monday_edit = new Array();
       var cont_monday_edit = 0;
       var select_tuesday_edit = new Array();
       var cont_tuesday_edit = 0;
       var select_weds_edit = new Array();
       var cont_weds_edit = 0;
       var select_thurday_edit = new Array();
       var cont_thurday_edit = 0;
       var select_friday_edit = new Array();
       var cont_friday_edit = 0;
       var select_saturday_edit = new Array();
       var cont_saturday_edit = 0;
       var select_sunday_edit = new Array();
       var cont_sunday_edit = 0;

       for (var i = 0; i < fechas.length; i++) {

           current_date = fechas[i].split('-');
           year = current_date[0];
           month = current_date[1];
           day = current_date[2];

            current_date = new Date(year,month-1,day);

            // domingo
           if (current_date.getDay()==0) {

              select_sunday_edit[cont_sunday_edit] = fechas[i];
              cont_sunday_edit++;
              $("#select_sunday_edit").append( "<p>" + fechas[i] + "<p/>");

           }
           //lunes
           if (current_date.getDay()==1) {

              select_monday_edit[cont_monday_edit] = fechas[i];
              cont_monday_edit++;
              $("#select_monday_edit").append( "<p>" + fechas[i] + "<p/>");

           }
           // martes
           if (current_date.getDay()==2) {

              select_tuesday_edit[cont_tuesday_edit] = fechas[i];
              cont_tuesday_edit++;
              $("#select_tuesday_edit").append( "<p>" + fechas[i] + "<p/>");

           }
           //miercoles
           if (current_date.getDay()==3) {

              select_weds_edit[cont_weds_edit] = fechas[i];
              cont_weds_edit++;
              $("#select_weds_edit").append( "<p>" + fechas[i] + "<p/>");

           }

           // jueves
           if (current_date.getDay()==4) {

              select_thurday_edit[cont_thurday_edit] = fechas[i];
              cont_thurday_edit++;
              $("#select_thurday_edit").append( "<p>" + fechas[i] + "<p/>");

           }
           // viernes
           if (current_date.getDay()==5) {

              select_friday_edit[cont_friday_edit] = fechas[i];
              cont_friday_edit++;
              $("#select_friday_edit").append( "<p>" + fechas[i] + "<p/>");

           }

           // sabado
           if (current_date.getDay()==6) {

              select_saturday_edit[cont_saturday_edit] = fechas[i];
              cont_saturday_edit++;
              $("#select_saturday_edit").append( "<p>" + fechas[i] + "<p/>");
           }
        

       }


        if (cont_monday_edit ==0) {


            $("#time_monday_edit").hide();

        }

          // martes
           if (cont_tuesday_edit ==0) {


            $("#time_tuesday_edit").hide();

        }
        //miercoles

         if (cont_weds_edit ==0) {


            $("#time_weds_edit").hide();

        }

        // jueves
         if (cont_thurday_edit ==0) {


            $("#time_thurday_edit").hide();

        }

        // viernes 
         if (cont_friday_edit ==0) {


            $("#time_friday_edit").hide();

        }

        // sabado
         if (cont_saturday_edit ==0) {


            $("#time_saturday_edit").hide();

        }
        // domingo
         if (cont_sunday_edit ==0) {


            $("#time_sunday_edit").hide();

        }

        // eliminar tr in tables
        //monday 
         //var rowCount = $('#table_monday_edit tr').length;
         $('table#table_monday_edit > tbody > tr').not(':first').not(':last').remove();
         $('table#table_tuesday_edit > tbody > tr').not(':first').not(':last').remove();
         $('table#table_weds_edit > tbody > tr').not(':first').not(':last').remove();
         $('table#table_thurday_edit > tbody > tr').not(':first').not(':last').remove();
         $('table#table_friday_edit > tbody > tr').not(':first').not(':last').remove();
         $('table#table_saturday_edit > tbody > tr').not(':first').not(':last').remove();
         $('table#table_sunday_edit > tbody > tr').not(':first').not(':last').remove();
     }
} // end function