

$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {

     var lat =  $("#lat").val() ;
     var lng =  $("#lng").val() ;
     // ciudad
     var lat_city = lat - 0.002163;
     var lng_city = lng + 0.00255;
     initialize();
var stockholm = new google.maps.LatLng(59.32522, 18.07002);
var parliament = new google.maps.LatLng(59.327383, 18.06747);
var marker;
var map;

function initialize() {
  var mapOptions = {
    zoom: 13,
    center: stockholm
  };

  map = new google.maps.Map(document.getElementById('map-canvas'),
          mapOptions);

  marker = new google.maps.Marker({
    map:map,
    draggable:true,
    animation: google.maps.Animation.DROP,
    position: parliament
  });
  google.maps.event.addListener(marker, 'dragend', toggleBounce);
  var lat = marker.getPosition().lat();
  var lng = marker.getPosition().lng();
document.getElementById("lat").value = lat;
document.getElementById("lng").value = lng;
}

function toggleBounce() {

var lat_input = marker.getPosition().lat();
var lng_input = marker.getPosition().lng();
document.getElementById("lat").value = lat_input;
document.getElementById("lng").value = lng_input;



  
}

google.maps.event.addDomListener(window, 'load', initialize);

  	

	
	});