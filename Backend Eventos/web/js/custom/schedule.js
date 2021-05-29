$('#datepicker2').datepicker({
    dateFormat: 'yy-mm-dd',
    onSelect: function() {
         check_datepicker();
    }
}); 
    
      
     function check_datepicker(){

      $("#select_monday").empty();
      $("#select_tuesday").empty();
      $("#select_weds").empty();
      $("#select_thurday").empty();
      $("#select_friday").empty();
      $("#select_saturday").empty();
      $("#select_sunday").empty(); 
      $("#select_monday").empty();
      // show table
       $("#time_monday").show();
       $("#time_tuesday").show();
       $("#time_weds").show();
       $("#time_thurday").show();
       $("#time_friday").show();
       $("#time_saturday").show();
       $("#time_sunday").show();

      var fecha = $('#datepicker1').val();
      var end_fecha = $('#datepicker2').val();

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
       var select_monday = new Array();
       var cont_monday = 0;
       var select_tuesday = new Array();
       var cont_tuesday = 0;
       var select_weds = new Array();
       var cont_weds = 0;
       var select_thurday = new Array();
       var cont_thurday = 0;
       var select_friday = new Array();
       var cont_friday = 0;
       var select_saturday = new Array();
       var cont_saturday = 0;
       var select_sunday = new Array();
       var cont_sunday = 0;

       for (var i = 0; i < fechas.length; i++) {

           current_date = fechas[i].split('-');
           year = current_date[0];
           month = current_date[1];
           day = current_date[2];

            current_date = new Date(year,month-1,day);

            // domingo
           if (current_date.getDay()==0) {

              select_sunday[cont_sunday] = fechas[i];
              cont_sunday++;
              $("#select_sunday").append( "<p>" + fechas[i] + "<p/>");

           }
           //lunes
           if (current_date.getDay()==1) {

              select_monday[cont_monday] = fechas[i];
              cont_monday++;
              $("#select_monday").append( "<p>" + fechas[i] + "<p/>");

           }
           // martes
           if (current_date.getDay()==2) {

              select_tuesday[cont_tuesday] = fechas[i];
              cont_tuesday++;
              $("#select_tuesday").append( "<p>" + fechas[i] + "<p/>");

           }
           //miercoles
           if (current_date.getDay()==3) {

              select_weds[cont_weds] = fechas[i];
              cont_weds++;
              $("#select_weds").append( "<p>" + fechas[i] + "<p/>");

           }

           // jueves
           if (current_date.getDay()==4) {

              select_thurday[cont_thurday] = fechas[i];
              cont_thurday++;
              $("#select_thurday").append( "<p>" + fechas[i] + "<p/>");

           }
           // viernes
           if (current_date.getDay()==5) {

              select_friday[cont_friday] = fechas[i];
              cont_friday++;
              $("#select_friday").append( "<p>" + fechas[i] + "<p/>");

           }

           // sabado
           if (current_date.getDay()==6) {

              select_saturday[cont_saturday] = fechas[i];
              cont_saturday++;
              $("#select_saturday").append( "<p>" + fechas[i] + "<p/>");
           }
        

       }


        if (cont_monday ==0) {


            $("#time_monday").hide();

        }

          // martes
           if (cont_tuesday ==0) {


            $("#time_tuesday").hide();

        }
        //miercoles

         if (cont_weds ==0) {


            $("#time_weds").hide();

        }

        // jueves
         if (cont_thurday ==0) {


            $("#time_thurday").hide();

        }

        // viernes 
         if (cont_friday ==0) {


            $("#time_friday").hide();

        }

        // sabado
         if (cont_saturday ==0) {


            $("#time_saturday").hide();

        }
        // domingo
         if (cont_sunday ==0) {


            $("#time_sunday").hide();

        }


       
      



     }
} // end function