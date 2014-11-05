<div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cancel</span></button>
          <h4 class="modal-title">New Event</h4>
        </div>
        <div class="modal-body">
        <div  id="errors" class="alert alert-danger alert-dismissable">
          
        
        </div>
          <form class="add_event" name="add_event" >
           <div class="bs-example">
              <ul id="myTab" class="nav nav-tabs">
                <li class="active"><a href="#information" data-toggle="tab">Information</a></li>
                <li class=""><a href="#princes" data-toggle="tab">Princes</a></li>
                <li class=""><a href="#languages" data-toggle="tab">Languages</a></li>
                <li class=""><a href="#pictures" data-toggle="tab">Pictures</a></li>
				<li class=""><a href="#map" data-toggle="tab">Map</a></li>  				
                   
              </ul>
              <div class="tab-content">
                <div class="tab-pane fade active in" id="information">  
                <strong>Events 's Name</strong> 
                <br>
                <input type="text" name="name_event" class="form-control" id="name_event">
				 
				 
                  <br>
                  <strong>City</strong>
                  <select class="form-control" name="city" id="city">
                  <option value="">Select City</option>
                  <?php
                    
                    foreach ($cities as $fila) {
                      # code...
                    
 
                     echo '<option value="'.$fila["id"].'">
   
                  '.$fila["city"].'</option>';
             
                    }

                    ?>
                  </select>
                
                
                <br>       
                <strong>Category</strong>
                <select class="form-control" name="content_to_city" id="content_to_city">
                
                </select>

                <div class="the-return">
                
                
                </div>
                <br>
                <div id="dir_alternative" class="form-group">
                <div class="checkbox">
                <label>
                  <input type="checkbox"> Has alternative direction ?
                </label>
              </div>
                  
                </div>
                <br>   
               <strong>Filters</strong>
                <div class="row">
                    <div class="col-md-6 ">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <input type="checkbox" name="Outdoor" id="Outdoor" >
                        </span>
                        <input type="text" class="form-control" value="Outdoor">
                      </div><!-- /input-group -->                      
                    </div><!-- /.col-md-5 -->

                    <div class="col-md-6">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <input type="checkbox" name="Formal_Dressed" id="Formal_Dressed">
                        </span>
                        <input type="text" class="form-control" value="Formal Dressed" >
                      </div><!-- /input-group -->                      
                    </div><!-- /.col-md-5 -->
                   
                  </div><!-- /.row -->

                <!--other filter -->
                <div class="row">
                    <div class="col-md-6">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <input type="checkbox" name="Kinds_Family" id="Kinds_Family">
                        </span>
                        <input type="text" class="form-control" value="Kinds & Family" >
                      </div><!-- /input-group -->                      
                    </div><!-- /.col-md-5 -->

                    <div class="col-md-6">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <input type="checkbox" name="NigthLife" id="NigthLife">
                        </span>
                        <input type="text" class="form-control" value="NigthLife" >
                      </div><!-- /input-group -->                      
                    </div><!-- /.col-md-5 -->
                   
                  </div><!-- /.row -->
                   <!--Date event -->
                    <br/>
                    <br/>
                    <strong>Beginning date:</strong>
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    <strong >Ending date:</strong>
                    
                    <div class="row">
                    <div class="col-md-6">
                      <div class="input-group ">
                         <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                         <input type="text" class="form-control input-append date" name="b_date" id="datepicker1">
                      </div><!-- /input-group -->                      
                    </div><!-- /.col-md-5 -->

                    <div class="col-md-6">

                      <div class="input-group">
                         <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                         <input type="text" class="form-control" name="e_date" id="datepicker2">
                      </div><!-- /input-group -->                      
                    </div><!-- /.col-md-5 -->
                   
                  </div><!-- /.row -->

                    
                      <br/>
                    <label>Notes</label>
                    <textarea rows="3" name="notes" id="notes" class="form-control">
                      

                    </textarea>
                    <br/>
                    <strong>Schedules of each day</strong>
                    <br/>
                    
                   <div class="week">
              <ul id="tab_week" class="nav nav-tabs">
                <li class="active"><a href="#Monday" data-toggle="tab">Monday</a></li>
                <li class=""><a href="#Tuesday" data-toggle="tab">Tuesday</a></li>
                <li class=""><a href="#Weds" data-toggle="tab">Weds.</a></li>
                <li class=""><a href="#Thurday" data-toggle="tab">Thurday</a></li> 
                <li class=""><a href="#Friday" data-toggle="tab">Friday</a></li>
                <li class=""><a href="#Saturday" data-toggle="tab">Saturday</a></li>
                <li class=""><a href="#Sunday" data-toggle="tab">Sunday</a></li>       
                     
              </ul>
              <div class="tab-content">

                        
                    <div id="select_sunday" class="hidden" >
                      
                    </div>
                    <div id="select_monday" class="hidden" >
                      
                    </div>
                    
                     <div id="select_tuesday" class="hidden" >
                      
                    </div>
                    <div id="select_weds" class="hidden" >
                      
                    </div>
                    <div id="select_thurday" class="hidden" >
                      
                    </div>
                    <div id="select_friday" class="hidden" >
                      
                    </div>
                    <div id="select_saturday" class="hidden" >
                      
                    </div>
                   
                    
                    <div class="tab-pane fade active in" id="Monday"> 
                    

                    <div id="time_monday">
                      
                       <table class="table table-bordered table-striped" id="table_monday">
                  <tr>
                    <td>Beginning time</td>
                    <td>Ending time</td>
                    <td>Date</td>
                    <td>Options</td>

                  </tr>
                 <tr>
                    
                     <td  colspan="4"><p class="text-center"> <button type="button" class="btn btn-default" onclick="add_monday();"> Add Schedule <span class="glyphicon glyphicon-plus-sign"></span> </button>  </p></td>
                  </tr>
                  </table>
                  
                  <div id="monday_hidden">
                    

                  </div>
                  <input type="hidden" id="rows_monday" name="rows_monday" value="0">
                    </div>
                
                   </div>

                   <div class="tab-pane fade " id="Tuesday">  
                        <div id="time_tuesday">
                          
                         <table class="table table-bordered table-striped" id="table_tuesday">
                  <tr>
                    <td>Beginning time</td>
                    <td>Ending time</td>
                    <td>Date</td>
                    <td>Options</td>

                  </tr>
                 <tr>
                    
                     <td  colspan="4"><p class="text-center"> <button type="button" class="btn btn-default" onclick="add_tuesday();"> Add Schedule <span class="glyphicon glyphicon-plus-sign"></span> </button>  </p></td>
                  </tr>
                  </table>
                  <div id="tuesday_hidden">
                    

                  </div>
                  <input type="hidden" id="rows_tuesday" name="rows_tuesday" value="0">

                        </div>
                   </div>

                   <div class="tab-pane fade " id="Weds">  
                        <div id="time_weds">
                          
                           <table class="table table-bordered table-striped" id="table_weds">
                  <tr>
                    <td>Beginning time</td>
                    <td>Ending time</td>
                    <td>Date</td>
                    <td>Options</td>

                  </tr>
                 <tr>
                    
                     <td  colspan="4"><p class="text-center"> <button type="button" class="btn btn-default" onclick="add_weds();"> Add Schedule <span class="glyphicon glyphicon-plus-sign"></span> </button>  </p></td>
                  </tr>
                  </table>

                  <div id="weds_hidden">
                    

                  </div>
                  <input type="hidden" id="rows_weds" name="rows_weds" value="0">

                        </div>
                   </div>
                   <div class="tab-pane fade " id="Thurday">  
                       <div id="time_thurday">
                         
                          <table class="table table-bordered table-striped" id="table_thurday">
                  <tr>
                    <td>Beginning time</td>
                    <td>Ending time</td>
                    <td>Date</td>
                    <td>Options</td>

                  </tr>
                 <tr>
                    
                     <td  colspan="4"><p class="text-center"> <button type="button" class="btn btn-default" onclick="add_thurday();"> Add Schedule <span class="glyphicon glyphicon-plus-sign"></span> </button>  </p></td>
                  </tr>
                  </table>
                  <div id="thurday_hidden">
                    

                  </div>
                  <input type="hidden" id="rows_thurday" name="rows_thurday" value="0">

                       </div>
                   </div>
                   <div class="tab-pane fade " id="Friday">  
                      <div id="time_friday">
                        
                         <table class="table table-bordered table-striped" id="table_friday">
                  <tr>
                    <td>Beginning time</td>
                    <td>Ending time</td>
                    <td>Date</td>
                    <td>Options</td>

                  </tr>
                 <tr>
                    
                     <td  colspan="4"><p class="text-center"> <button type="button" class="btn btn-default" onclick="add_friday();"> Add Schedule <span class="glyphicon glyphicon-plus-sign"></span> </button>  </p></td>
                  </tr>
                  </table>
                  <div id="friday_hidden">
                    

                  </div>
                  <input type="hidden" id="rows_friday" name="rows_friday" value="0">

                      </div>
                   </div>
                   <div class="tab-pane fade " id="Saturday">  
                       <div id="time_saturday">
                         
                          <table class="table table-bordered table-striped" id="table_saturday">
                  <tr>
                    <td>Beginning time</td>
                    <td>Ending time</td>
                    <td>Date</td>
                    <td>Options</td>

                  </tr>
                 <tr>
                    
                     <td  colspan="4"><p class="text-center"> <button type="button" class="btn btn-default" onclick="add_saturday();"> Add Schedule <span class="glyphicon glyphicon-plus-sign"></span> </button>  </p></td>
                  </tr>
                  </table>
                    <div id="saturday_hidden">
                    

                  </div>
                  <input type="hidden" id="rows_saturday" name="rows_saturday" value="0">

                       </div>
                   </div>
                   <div class="tab-pane fade " id="Sunday">  
                       <div id="time_sunday">
                         
                         <table class="table table-bordered table-striped" id="table_sunday" >
                  <tr>
                    <td>Beginning time</td>
                    <td>Ending time</td>
                    <td>Date</td>
                    <td>Options</td>

                  </tr>
                 <tr>
                    
                     <td  colspan="4"><p class="text-center"> <button type="button" class="btn btn-default" onclick="add_sunday();"> Add Schedule <span class="glyphicon glyphicon-plus-sign"></span> </button>  </p></td>
                  </tr>
                  </table>

                   <div id="sunday_hidden">
                    

                  </div>
                  <input type="hidden" id="rows_sunday" name="rows_sunday" value="0">

                       </div>
                   </div>
              </div>
          </div>



                
                </div>
                <div class="tab-pane fade" id="princes">
                  <strong>Princes</strong>
                   <div class="row">
                    <div class="col-lg-6">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <input type="checkbox" id="unique" name="unique">
                        </span>
                        <input type="text" class="form-control" value="There is a unique prices for all the ages" name="valor_prices">
                      </div><!-- /input-group -->                      
                    </div><!-- /.col-md-5 -->
                    </div>
                    <!-- Prices ages-->
                    <br/>
              <div id="unique_prices" class="form-group">

                     <p>
      </p><div class="input-group">
          <span class="input-group-btn">
              <button type="button" class="btn btn-default " disabled="disabled" >
                  €
              </button>
          </span>
          <input type="text" name="price_unique" class="form-control input-number">
          <span class="input-group-btn">
              <button type="button" class="btn btn-default" disabled="disabled">
                 ,00
              </button>
          </span>
      </div>
    <p></p>
    </div>
                      <br/>
                      <div id="by_age" >
                    <strong>Prices per ages:</strong>
                    <input type = "hidden" name = "rows_ages" id = "rows_ages" value="0">
                     <table class="table table-bordered table-striped" id="prices_age">
                  <tr>
                    <td>Min.age</td>
                    <td>Max.age</td>
                    <td>Price(,00€)</td>
                     <td>Options</td>

                  </tr>
                  <tr>
                    
                     <td  colspan="4"rowspan="1">
                     <p class="text-center">  <button type="button" class="btn btn-default" onclick="add_row();"> Add Schedule <span class="glyphicon glyphicon-plus-sign"></span> </button> </p></td>
                  </tr>
                  </table>

                   <div id="prices_ages_hidden">                     
                   


                  </div>
                  </div>
                   <!-- Prices special-->                   
                    <strong> Special Prices: </strong>
                    <input type = "hidden" name = "rows_special" id = "rows_special" value="0">
                        <table class="table table-bordered table-striped" id="pack_special">
                  <tr>
                    <td>Type/Name of the pack</td>
                    <td>Price(€)</td>
                    <td>Options</td>

                  </tr>
                  <tr>
                    
                     <td  colspan="3"><p class="text-center"> <button type="button" class="btn btn-default" onclick="special_prices();"> Add Schedule <span class="glyphicon glyphicon-plus-sign"></span> </button>  </p></td>
                  </tr>
                  </table>
                  <div id="prices_pack_hidden">
                    

                  </div>
      


                </div>

                <div class="tab-pane fade" id="languages">
                  <strong>Languages</strong>
                  <select class="form-control" name="language" id ="language">
                  <option value="">Select Language</option>
                  <?php

                     foreach ($languages as $fila) {
                      # code...
                    
 
                     echo '<option value="'.$fila["id"].'">
   
                  '.$fila["name"].'</option>';
             
                    }


                  ?>
                  </select>

                  <br>       
                <strong>Topics</strong>
                <select class="form-control" name="topics" id="topics">
                
                </select>

                   <br>
                   <strong>price observations</strong>
                  <textarea class="form-control" rows="3" name="price_obervations"></textarea>
                  
                  <br>
          <strong>brief description</strong>
      <textarea class="form-control" rows="3"  id="brief_description" name="brief_description" maxlength="200"></textarea>
      <br>
                  <div id="characterLeft"></div>
      <br/>
      <strong>description</strong>
      <textarea class="form-control" rows="3" name="description"></textarea>
                </div>

              
                <div class="tab-pane fade" id="pictures">
                <input type = "hidden" name = "rows_img" id = "rows_img" value="0">
                
                <table class="table table-bordered table-striped" id="table_img">
                  <tr>
                    <td>Caption</td>
                    <td>Preview</td>
                    <td>Cover?</td>
                    <td>Options</td>

                  </tr>
                  <tr>
                    <td>
                    
                    <input type="text"  name="caption" id="caption" size="12" >
                    </td>
                    <td><input type="text"  name="preview" id="preview" size="12"></td>
                    <td><input type="checkbox"  name="cover" id="cover"></td>
                    <td>
                    <button type="button" class="btn btn-xs btn-primary">Done</button>
                    <button type="button" class="btn btn-xs btn-danger">delete</button>
                    </td>


                  </tr>
                  <tr>
                    
                     <td  colspan="4"rowspan="1" >
                     <p class="text-center"> <button type="button" class="btn btn-default" onclick="add_picture();"> Add Picture <span class="glyphicon glyphicon-plus-sign"></span> </button>  </p>
                    </td>
                  </tr>
                  </table>


                </div>
				
				
				  <div class="tab-pane fade" id="map">
          <input type = "hidden" name = "lat" id = "lat">
          <input type = "hidden" name = "lng" id = "lng">
                    <div id="map-canvas" </div>
					
                 
                </div>
                
                
              </div>
            </div>




        </div>
        <div class="modal-footer">
          
          <input class="btn btn-success" type="submit" value="Add Event" id="submit">
		  
		 
        </div>
		</form>
      </div><!-- /.modal-content -->
	  
    </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->