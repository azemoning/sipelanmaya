var map, infoWindow;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: { lat: -7.966410, lng: 112.631778 },
          zoom: 16
        });
        // infoWindow = new google.maps.InfoWindow;
      //   var marker = new google.maps.Marker({
      //     position: new google.maps.LatLng(-7.961832,112.637608),
      //     title: 'Draggable Marker',
      //     map: map
      //     //draggable: true
      // });
    
      // // Update marker position txt.
      // updateMarkerPositionTxt(latLng);
    
      // // Add dragging event listeners.
      // google.maps.event.addListener(marker, 'dragstart', function() {
      //     updateMarkerStateTxt('Dragging start...');
      // });
    
      // google.maps.event.addListener(marker, 'drag', function() {
      //     updateMarkerStateTxt('Dragging...');
      //     updateMarkerPositionTxt(marker.getPosition());
      // });
    
      // google.maps.event.addListener(marker, 'dragend', function() {
      //     updateMarkerStateTxt('Drag ended');
      // });
    
    
    // Onload handler to fire off the app:
    // google.maps.event.addDomListener(window, 'load', initialize);
      //   google.maps.event.addListener(map, 'click', function (e) {

      //     //Determine the location where the user has clicked.
      //     var location = e.latLng;

      //     //Create a marker and placed it on the map.
      //     var marker = new google.maps.Marker({
      //         position: location,
      //         map: map
      //     });

      //     //Attach click event handler to the marker.
      //     google.maps.event.addListener(marker, "click", function (e) {
      //         var infoWindow = new google.maps.InfoWindow({
      //             content: 'Latitude: ' + location.lat() + '<br />Longitude: ' + location.lng()
      //         });
      //         infoWindow.open(map, marker);
      //     });
      // });
        // Try HTML5 geolocation.
      // if (navigator.geolocation) {
      // navigator.geolocation.getCurrentPosition(function(position) {
      // var pos = {
      // lat: position.coords.latitude,
      // lng: position.coords.longitude,
      // };

      // infoWindow.setPosition(pos);
      // infoWindow.setContent('Your Location.');
      // infoWindow.open(map);
      // map.setCenter(pos);
      // }, function() {
      // handleLocationError(true, infoWindow, map.getCenter());
      // });
      // } else {
      // // Browser doesn't support Geolocation
      // handleLocationError(false, infoWindow, map.getCenter());
      // }
      // }

      // function handleLocationError(browserHasGeolocation, infoWindow, pos) {
      // infoWindow.setPosition(pos);
      // infoWindow.setContent(browserHasGeolocation ?
      // 'Error: The Geolocation service failed.' :
      // 'Error: Your browser doesn\'t support geolocation.');
      // infoWindow.open(map);
      }