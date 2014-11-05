
$("#edit_lat").val(lat);
$("#edit_lng").val(lng);
var stockholm = new google.maps.LatLng(59.32522, 18.07002);
var parliament = new google.maps.LatLng(59.327383, 18.06747);
var marker;
var map;

function initialize() {
  var mapOptions = {
    zoom: 13,
    center: stockholm
  };

  map = new google.maps.Map(document.getElementById('edit_map-canvas'),
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
document.getElementById("edit_lat").value = lat;
document.getElementById("edit_lat").value = lng;
}

function toggleBounce() {

var lat = marker.getPosition().lat();
var lng = marker.getPosition().lng();
document.getElementById("edit_lat").value = lat;
document.getElementById("edit_lng").value = lng;



  
}

google.maps.event.addDomListener(window, 'load', initialize);

$('a[href="#edit_map"]').on('shown.bs.tab', function (e) {
  	initialize();
	
	});