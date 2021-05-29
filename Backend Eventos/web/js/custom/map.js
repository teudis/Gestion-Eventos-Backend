
var marker;
var map;
var lat ;
var lng;



function toggleBounce() {

var lat = marker.getPosition().lat();
var lng = marker.getPosition().lng();
document.getElementById("lat").value = lat;
document.getElementById("lng").value = lng;
  
}

//google.maps.event.addDomListener(window, 'load', initialize);

$('a[href="#map"]').on('shown.bs.tab', function (e) {
     //initialize();


	
		//var panPoint = new google.maps.LatLng(document.getElementById("lat").value, document.getElementById("lng").value);
		//var parliament = new google.maps.LatLng(59.327383, 18.06747);
		var lat = document.getElementById("lat").value;
		var lng = document.getElementById("lng").value;
		//var location= new google.maps.LatLng(lat, lng);
		//map.setCenter(location);
     var stockholm;
     var parliament
    if (lat != "" && lng !="" ) {

      stockholm = new google.maps.LatLng(lat, lng);
      parliament = new google.maps.LatLng(lat, lng);
    }
    else
    {

      stockholm = new google.maps.LatLng(59.32522, 18.07002);
      parliament = new google.maps.LatLng(59.327383, 18.06747);

    }
    
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
	
  
  });

$("button#search_address").on('click',function(){

  //initialize();
  geocoder = new google.maps.Geocoder();
  var address = document.getElementById('address').value;
  //console.log(address);
  geocoder.geocode( { 'address': address}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
    //console.log(results[0].geometry.location);
      map.setCenter(results[0].geometry.location);
      marker = new google.maps.Marker({
          map: map,
      draggable:true,
      animation: google.maps.Animation.DROP,
          position: results[0].geometry.location
      });
    
   google.maps.event.addListener(marker, 'dragend',toggleBounce);
   lat = marker.getPosition().lat();
   lng = marker.getPosition().lng();
   
   document.getElementById("lat").value = lat;
   document.getElementById("lng").value = lng;
      
    } else {
      alert('Geocode was not successful for the following reason: ' + status);
    }
  });


});