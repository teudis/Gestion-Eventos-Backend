
var marker_edit;
var map_edit;
var lat_edit ;
var lng_edit;



function toggleBounce() {

var lat_edit = marker_edit.getPosition().lat();
var lng_edit = marker_edit.getPosition().lng();
document.getElementById("edit_lat").value = lat_edit;
document.getElementById("edit_lng").value = lng_edit;
  
}



$('a[href="#edit_map"]').on('shown.bs.tab', function (e) {
  	
    var lat_edit = document.getElementById("edit_lat").value;
    var lng_edit = document.getElementById("edit_lng").value;
    var stockholm = new google.maps.LatLng(lat_edit, lng_edit);
    var parliament = new google.maps.LatLng(lat_edit, lng_edit);
     var mapOptions = {
    zoom: 13,
    center: stockholm
  };

  map_edit = new google.maps.Map(document.getElementById('edit_map-canvas'),
          mapOptions);

  marker_edit = new google.maps.Marker({
    map:map_edit,
    draggable:true,
    animation: google.maps.Animation.DROP,
    position: parliament
  });
  google.maps.event.addListener(marker_edit, 'dragend', toggleBounce);
  var lat_edit = marker_edit.getPosition().lat();
  var lng_edit = marker_edit.getPosition().lng();
  document.getElementById("edit_lat").value = lat_edit;
  document.getElementById("edit_lng").value = lng_edit;
	
	});

$("button#search_address_edit").on('click',function(){

  //initialize();
  geocoder = new google.maps.Geocoder();
  var address = document.getElementById('address_edit').value;
  //console.log(address);
  geocoder.geocode( { 'address': address}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
    //console.log(results[0].geometry.location);
      map_edit.setCenter(results[0].geometry.location);
      marker_edit = new google.maps.Marker({
          map: map_edit,
      draggable:true,
      animation: google.maps.Animation.DROP,
          position: results[0].geometry.location
      });
    
   google.maps.event.addListener(marker_edit, 'dragend',toggleBounce);
   lat_edit = marker_edit.getPosition().lat();
   lng_edit = marker_edit.getPosition().lng();
   
   document.getElementById("edit_lat").value = lat_edit;
   document.getElementById("edit_lng").value = lng_edit;
      
    } else {
      alert('Geocode was not successful for the following reason: ' + status);
    }
  });


});