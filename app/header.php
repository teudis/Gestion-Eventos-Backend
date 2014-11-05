<?php
#####################################################
#=>Includes:
#####################################################
#####################################################
#=>Variables of the document:
#####################################################
/*
$current_user = $_SESSION["username"];
$current_user_id = $_SESSION["user_id"];
$current_city_id = $_SESSION["user_city_id"];
*/
#####################################################

require_once(__DIR__."./classes/conectorDB.php");
require_once(__DIR__."./classes/City.php");
require_once(__DIR__."./classes/Languages.php");
require_once(__DIR__."./classes/Events.php");
require_once(__DIR__."./classes/Content_to_city.php");
 $city = new City;
 $cities = $city->get_city();

 $language = new Languages;
 $languages = $language->get_languages();
 $event = new Events;
 $events = $event->get_events();

 $content = new Content_to_city;

 $contents = $content->get_content_to_city();


?>
<nav class="navbar navbar-inverse" role="navigation">

  <div class="container">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle navbar-right-logo" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <i class="icon-cog"></i>
    </button>
    <!-- <a class="navbar-brand" href="./index.php">BITDAYCITY</a> -->
    <a class="navbar-brand" href="./index.php"><img class="img-responisive" src="./web/res/logo-i.png"></a>
    <!-- <a class="navbar-brand" href="./index.php"><span style="color:#F90"><img class="img-responisive" src="res/logo-i.png"></span> -->
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
  <ul class="nav navbar-nav navbar-right">

    <li class="dropdown">
      <a href="javscript:;" class="dropdown-toggle" data-toggle="dropdown">
        <i class="icon-user"></i>
        <?php echo ucfirst($user);?>
        <b class="caret"></b>
      </a>
      
      <ul class="dropdown-menu">
        <li><a href="javascript:;">My Profile</a></li>
        <li><a href="javascript:;">Help</a></li>
        <li class="divider"></li>
        <li><a href="./logout.php">Logout</a></li>
      </ul>
    </li>
  </ul>
    
  </div><!-- /.navbar-collapse -->
</div> <!-- /.container -->
</nav>
    
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <a href="javascript:;" class="subnav-toggle" data-toggle="collapse" data-target=".subnav-collapse">
        <span class="sr-only">Toggle navigation</span>
        <i class="icon-reorder"></i>
      </a>
      <div class="collapse subnav-collapse">
        <ul class="mainnav">
        
        <li id="events-area">
          <a onclick="" href="./event-area.php">
            <i class="icon-ticket"></i>
            <span>Events</span>
          </a>              
        </li>

        </ul>
      </div> <!-- /.subnav-collapse -->
    </div> <!-- /container -->
  </div> <!-- /subnavbar-inner -->
</div> <!-- /subnavbar -->
<div class="container">
  <div class="row">
    <div class="col-md-12">   
      <!--<div class="alert alert-warning fade in" style="background-color: #f8eec7; border-color: #f2e09a;">-->
              <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>-->
              <!--<img style="float: left;margin-top: 7px;margin-right: 5px;" src="https://www.gcn.us.es/files/ico_new.gif">-->
              <!--<p style="color: #796620;"><strong>TThere is a new button in the Schedule Menu(</strong>-->
              <!--<p><strong>Daily schedules can now be copied to multiple days at a time using the new button(</strong>-->
                <!--<button style="padding: 0;width: 50px;height: 23px;" type="button" class="btn btn-primary dropdown-toggle btn-sm copy-sch" data-toggle="dropdown">Copy<span class="caret"></span></button>-->
                <!--<strong>) placed in the right of each row.</strong></p>-->
        <!--</div>-->
    </div>
  </div>
</div>