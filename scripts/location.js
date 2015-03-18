function initialize()
{
  var mapCanvas = document.getElementById('map-canvas');
  var mapOptions = {
      center: new google.maps.LatLng(44.6376249, -63.5755864),
      zoom: 16,
      mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  var map = new google.maps.Map(mapCanvas, mapOptions)
  var marker = new google.maps.Marker({    
      position: new google.maps.LatLng(44.6376249, -63.5755864),    
      map: map    
  });
}

google.maps.event.addDomListener(window, 'load', initialize);
