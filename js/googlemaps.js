var marker, map, infoWindow;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: { lat: -7.966410, lng: 112.631778 },
          zoom: 16
        });

        marker = new google.maps.Marker({
          position: new google.maps.LatLng(-7.966308, 112.631627),
          map: map,
          draggable: true
        })
         google.maps.event.addListener(marker,'dragend',function(){
           
            var lat = marker.getPosition().lat();
            var lng = marker.getPosition().lng();

            $('#lat').val(lat);
            $('#lng').val(lng);
        })
      }