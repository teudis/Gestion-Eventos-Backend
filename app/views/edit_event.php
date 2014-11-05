<div class="modal fade" id="edit_modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cancel</span></button>
          <h4 class="modal-title">Edit Event</h4>
        </div>
        <div class="modal-body">
        <div  id="errors_edit" class="alert alert-danger alert-dismissable">
          
        
        </div>
          <form class="edit_event" name="edit_event" >
          <input type="hidden" name="id_event_edit" id="id_event_edit">
           <div class="bs-example">
              <ul id="myTab" class="nav nav-tabs">
                <li class="active"><a href="#edit_information" data-toggle="tab">Information</a></li>
                <li class=""><a href="#edit_princes" data-toggle="tab">Princes</a></li>
                <li class=""><a href="#edit_languages" data-toggle="tab">Languages</a></li>
                <li class=""><a href="#edit_pictures" data-toggle="tab">Pictures</a></li>
				<li class=""><a href="#edit_map" data-toggle="tab">Map</a></li>  				
                     
              </ul>
              <div class="tab-content">
                <div class="tab-pane fade active in" id="edit_information">  
                <strong>Events 's Name</strong> 
                <br>
                <input type="hidden" name="edit_id_form" id="edit_id_form">
                <input type="text" name="edit_name_event" class="form-control" id="edit_name_event">
				 
				 
                  <br>
                  <strong>City</strong>
                  <select class="form-control" name="edit_city" id="edit_city">
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
                <select class="form-control" name="edit_content_to_city" id="edit_content_to_city">
                
                </select>

                <div class="edit_the-return">


                
                </div>
                <br>
                <div id="edit_dir_alternative" class="form-group">
                <div class="checkbox">
                <label>
                  <input type="checkbox"> Has alternative direction ?
                </label>
              </div>
                  
                </div>
                <br>   
               <strong>Filters</strong>
                <div class="row">
                    <div class="col-md-6">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <input type="checkbox" name="edit_Outdoor" id="edit_Outdoor" >
                        </span>
                        <input type="text" class="form-control" value="Outdoor">
                      </div><!-- /input-group -->                      
                    </div><!-- /.col-md-5 -->

                    <div class="col-md-6">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <input type="checkbox" name="edit_Formal_Dressed" id="edit_Formal_Dressed">
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
                          <input type="checkbox" name="Kinds_Family" id="edit_Kinds_Family">
                        </span>
                        <input type="text" class="form-control" value="Kinds & Family" >
                      </div><!-- /input-group -->                      
                    </div><!-- /.col-md-5 -->

                    <div class="col-md-6">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <input type="checkbox" name="edit_NigthLife" id="edit_NigthLife">
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
                      <div class="input-group">
                         <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                         <input type="text" class="form-control input-append date" name="edit_b_date" id="edit_datepicker1">
                      </div><!-- /input-group -->                      
                    </div><!-- /.col-md-5 -->

                    <div class="col-md-6">

                      <div class="input-group">
                         <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                         <input type="text" class="form-control" name="edit_e_date" id="edit_datepicker2">
                      </div><!-- /input-group -->                      
                    </div><!-- /.col-md-5 -->
                   
                  </div><!-- /.row -->

                    <br/>
                    <label>Notes</label>
                    <textarea rows="3" name="edit_notes" id="edit_notes" class="form-control">
                      

                    </textarea>
                    <br/>
                   <div class="week">
              <ul id="tab_week" class="nav nav-tabs">
                <li class="active"><a href="#edit_Monday" data-toggle="tab">Monday</a></li>
                <li class=""><a href="#edit_Tuesday" data-toggle="tab">Tuesday</a></li>
                <li class=""><a href="#edit_Weds" data-toggle="tab">Weds.</a></li>
                <li class=""><a href="#edit_Thurday" data-toggle="tab">Thurday</a></li> 
                <li class=""><a href="#edit_Friday" data-toggle="tab">Friday</a></li>
                <li class=""><a href="#edit_Saturday" data-toggle="tab">Saturday</a></li>
                <li class=""><a href="#edit_Sunday" data-toggle="tab">Sunday</a></li>       
                     
              </ul>
              <div class="tab-content">
              <div id="select_sunday" class="hidden" >
                      
                    </div>
                    <div id="select_monday_edit" class="hidden" >
                      
                    </div>
                    
                     <div id="select_tuesday_edit" class="hidden" >
                      
                    </div>
                    <div id="select_weds_edit" class="hidden" >
                      
                    </div>
                    <div id="select_thurday_edit" class="hidden" >
                      
                    </div>
                    <div id="select_friday_edit" class="hidden" >
                      
                    </div>
                    <div id="select_saturday_edit" class="hidden" >
                      
                    </div>
                    <div class="tab-pane fade active in" id="edit_Monday">  

                    <div id="edit_time_monday">
                      
                        <table class="table table-bordered table-striped" id="table_monday_edit">
                  <tr>
                    <td>Beginning time</td>
                    <td>Ending time</td>
                    <td>Date</td>
                    <td>Options</td>

                  </tr>
                 <tr>
                    
                     <td  colspan="4"><p class="text-center"> <button type="button" class="btn btn-default" onclick="add_monday_edit();"> Add Schedule <span class="glyphicon glyphicon-plus-sign"></span> </button>  </p></td>
                  </tr>
                  </table>
                    
                      <div id="monday_edit_hidden">
                    

                  </div>
                  <input type="hidden" id="rows_monday_edit" name="rows_monday_edit" value="0">


                    </div>
                
                   </div>

                   <div class="tab-pane fade " id="edit_Tuesday">  
                        <div id="edit_time_tuesday">
                          
                          <table class="table table-bordered table-striped" id="table_tuesday_edit">
                  <tr>
                    <td>Beginning time</td>
                    <td>Ending time</td>
                    <td>Date</td>
                    <td>Options</td>

                  </tr>
                 <tr>
                    
                     <td  colspan="4"><p class="text-center"> <button type="button" class="btn btn-default" onclick="add_tuesday_edit();"> Add Schedule <span class="glyphicon glyphicon-plus-sign"></span> </button>  </p></td>
                  </tr>
                  </table>
                  <div id="tuesday_edit_hidden">
                    

                  </div>
                  <input type="hidden" id="rows_tuesday_edit" name="rows_tuesday_edit" value="0">
                        </div>
                   </div>

                   <div class="tab-pane fade " id="edit_Weds">  
                        <div id="edit_time_weds">

                         <table class="table table-bordered table-striped" id="table_weds_edit">
                  <tr>
                    <td>Beginning time</td>
                    <td>Ending time</td>
                    <td>Date</td>
                    <td>Options</td>

                  </tr>
                 <tr>
                    
                     <td  colspan="4"><p class="text-center"> <button type="button" class="btn btn-default" onclick="add_weds_edit();"> Add Schedule <span class="glyphicon glyphicon-plus-sign"></span> </button>  </p></td>
                  </tr>
                  </table>

                  <div id="weds_edit_hidden">
                    

                  </div>
                  <input type="hidden" id="rows_weds_edit" name="rows_weds_edit" value="0">
                          

                        </div>
                   </div>
                   <div class="tab-pane fade " id="edit_Thurday">  
                       <div id="edit_time_thurday">
                         
                         <table class="table table-bordered table-striped" id="table_thurday_edit">
                  <tr>
                    <td>Beginning time</td>
                    <td>Ending time</td>
                    <td>Date</td>
                    <td>Options</td>

                  </tr>
                 <tr>
                    
                     <td  colspan="4"><p class="text-center"> <button type="button" class="btn btn-default" onclick="add_thurday_edit();"> Add Schedule <span class="glyphicon glyphicon-plus-sign"></span> </button>  </p></td>
                  </tr>
                  </table>
                  <div id="thurday_edit_hidden">
                    

                  </div>
                  <input type="hidden" id="rows_thurday_edit" name="rows_thurday_edit" value="0">




                       </div>
                   </div>
                   <div class="tab-pane fade " id="edit_Friday">  
                      <div id="edit_time_friday">
                        
                        <table class="table table-bordered table-striped" id="table_friday_edit">
                  <tr>
                    <td>Beginning time</td>
                    <td>Ending time</td>
                    <td>Date</td>
                    <td>Options</td>

                  </tr>
                 <tr>
                    
                     <td  colspan="4"><p class="text-center"> <button type="button" class="btn btn-default" onclick="add_friday_edit();"> Add Schedule <span class="glyphicon glyphicon-plus-sign"></span> </button>  </p></td>
                  </tr>
                  </table>
                  <div id="friday_edit_hidden">
                    

                  </div>
                  <input type="hidden" id="rows_friday_edit" name="rows_friday_edit" value="0">


                      </div>
                   </div>
                   <div class="tab-pane fade " id="edit_Saturday">  
                       <div id="edit_time_saturday">
                         
                        <table class="table table-bordered table-striped" id="table_saturday_edit">
                  <tr>
                    <td>Beginning time</td>
                    <td>Ending time</td>
                    <td>Date</td>
                    <td>Options</td>

                  </tr>
                 <tr>
                    
                     <td  colspan="4"><p class="text-center"> <button type="button" class="btn btn-default" onclick="add_saturday_edit();"> Add Schedule <span class="glyphicon glyphicon-plus-sign"></span> </button>  </p></td>
                  </tr>
                  </table>
                    <div id="saturday_edit_hidden">
                    

                  </div>
                  <input type="hidden" id="rows_saturday_edit" name="rows_saturday_edit" value="0">


                       </div>
                   </div>
                   <div class="tab-pane fade " id="edit_Sunday">  
                       <div id="edit_time_sunday">
                         

                      <table class="table table-bordered table-striped" id="table_sunday_edit" >
                  <tr>
                    <td>Beginning time</td>
                    <td>Ending time</td>
                    <td>Date</td>
                    <td>Options</td>

                  </tr>
                 <tr>
                    
                     <td  colspan="4"><p class="text-center"> <button type="button" class="btn btn-default" onclick="add_sunday_edit();"> Add Schedule <span class="glyphicon glyphicon-plus-sign"></span> </button>  </p></td>
                  </tr>
                  </table>

                   <div id="sunday_edit_hidden">
                    

                  </div>
                  <input type="hidden" id="rows_sunday_edit" name="rows_sunday_edit" value="0">



                       </div>
                   </div>
              </div>
          </div>



                
                </div>
                <div class="tab-pane fade" id="edit_princes">
                  <strong>Princes</strong>
                   <div class="row">
                    <div class="col-lg-6">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <input type="checkbox" id="edit_unique" name="edit_unique">
                        </span>
                        <input type="text" class="form-control" value="There is a unique prices for all the ages" name="valor_prices">
                      </div><!-- /input-group -->                      
                    </div><!-- /.col-md-5 -->
                    </div>
                    <!-- Prices ages-->
                    <br/>
              <div id="edit_unique_prices">

                     <p>
      </p><div class="input-group">
          <span class="input-group-btn">
              <button type="button" class="btn btn-default " disabled="disabled" >
                  €
              </button>
          </span>
          <input type="text" name="edit_price_unique" id="edit_price_unique" class="form-control input-number">
          <span class="input-group-btn">
              <button type="button" class="btn btn-default" disabled="disabled">
                 ,00
              </button>
          </span>
      </div>
    <p></p>
    </div>
                      <br/>
                      <div id="edit_by_age">
                    <strong>Prices per ages:</strong>
                    <input type = "hidden" name = "edit_rows_ages" id = "edit_rows_ages" value="0">
                     <table class="table table-bordered table-striped" id="edit_prices_age">
                  <tr>
                    <td>Min.age</td>
                    <td>Max.age</td>
                    <td>Price(,00€)</td>
                     <td>Options</td>

                  </tr>
                  <tr>
                    
                     <td  colspan="4"rowspan="1">
                     <p class="text-center">  <button type="button" class="btn btn-default" onclick="edit_add_row();"> Add Schedule <span class="glyphicon glyphicon-plus-sign"></span> </button> </p></td>
                  </tr>
                  </table>
                  <div id="edit_prices_ages_hidden">                     
                   


                  </div>
                  </div>
                   <!-- Prices special-->                   
                    <strong> Special Prices: </strong>
                    <input type = "hidden" name = "edit_rows_special" id = "edit_rows_special" value="0">
                        <table class="table table-bordered table-striped" id="edit_pack_special">
                  <tr>
                    <td>Type/Name of the pack</td>
                    <td>Price(€)</td>
                    <td>Options</td>

                  </tr>
                  <tr>
                    
                     <td  colspan="3"><p class="text-center"> <button type="button" class="btn btn-default" onclick="edit_special_prices();"> Add Schedule <span class="glyphicon glyphicon-plus-sign"></span> </button>  </p></td>
                  </tr>
                  </table>

                  <div id="edit_prices_pack_hidden">
                    

                  </div>

                </div>

                <div class="tab-pane fade" id="edit_languages">
                  <strong>Languages</strong>
                  <select class="form-control" name="edit_language" id="edit_language">
                  <option>Select Language</option>
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
                <select class="form-control" name="edit_topics" id="edit_topics">
                
                </select>

                   <br>
          <strong>brief_description</strong>
      <textarea class="form-control" rows="3" name="edit_brief_description" id="edit_brief_description"></textarea>
      <br/>
      <strong>description</strong>
      <textarea class="form-control" rows="3" name="edit_description" id="edit_description"></textarea>
        <strong>price observations</strong>
            <textarea class="form-control" rows="3" name="edit_price_obervations" id="edit_price_obervations"></textarea>


                </div>                            
            
                
                <div class="tab-pane fade" id="edit_pictures">
                
                
                <label>Images</label>
                <input type="hidden" name="edit_cont_img" id="edit_cont_img">
                <div id="edit_show_images">
                 

                </div>
                <div id="edit_name_img_div">

                
                </div>
                <div id='edit_preview'>
                </div>
                <br>
                <div id="edit_upload_img"> 
                <form id="photo-form" method="post" enctype="multipart/form-data">                
                <input type="file" name="edit_photoimg" id="edit_photoimg">                
                
                                  
                </form>
                </div>
                </div>
				
				
				  <div class="tab-pane fade" id="edit_map">
          <input type = "hidden" name = "edit_lat" id = "edit_lat">
          <input type = "hidden" name = "edit_lng" id = "edit_lng">
          <div class="input-group">
            <input class="form-control" type="text" id="address_edit" value="" class="form-control" >
            <span class="input-group-btn">
            <button class="btn btn-primary" type="button" id="search_address_edit" >Search!</button>
            </span>
            </div>
            <br/>
                    <div id="edit_map-canvas" </div>
					
                 
                </div>
                
                
              </div>
            </div>




        </div>
        <div class="modal-footer">

          
          <input class="btn btn-success" type="submit" value="Edit Event" id="submit_edit">
		  <a href="#" class="btn btn-default" data-dismiss="modal">Cancel</a>
		 
        </div>
		</form>
      </div><!-- /.modal-content -->
	  
    </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->