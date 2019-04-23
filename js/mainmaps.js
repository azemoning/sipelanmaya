function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: -7.966410, lng: 112.631778 },
        zoom: 15,
    });
    var input = document.getElementById('pac-input');

    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);   
    var infowindow = new google.maps.InfoWindow();                 
     var infowindowContent = [
         ['<h3>Jalan 1</h3><br><p>Ditutup karena perbaikan jalan</p>'],
         ['<h3>Jalan 2</h3><br><p>Ditutup karena ada hajatan warga</p>'],
         ['<h3>Jalan 3</h3><br><img src="img/page/jembatan.jpg" style="object-fit:contain;height:200px;"><br><p>Ditutup lur, karena jembatan ambruk <br>puter balik, cari jalan lain.</p>']
     ]
     var lokasiTutup = [
         ['Tutup',-7.961832,112.637608],
         ['Tutup',-7.965115,112.642468],
         ['Tutup',-7.969960,112.629872]
     ];
     var marker,i;
     google.maps.event.addListener(map, 'click', function(event) {
         placeMarker(event.LatLng);
     })

     function placeMarker(location) {
         var marker = new google.maps.Marker({
             position: location,
             map: map
         });
     }
     for (i=0; i < lokasiTutup.length; i++){
          marker= new google.maps.Marker({
              position: new google.maps.LatLng(lokasiTutup[i][1],lokasiTutup[i][2]),
              map: map
          });
         google.maps.event.addListener(marker, 'click', (function(marker,i){
             return function(){
                 infowindow.setContent(infowindowContent[i][0]);
                 infowindow.open(map,marker);
             }
         })(marker,i));
     }

    autocomplete.addListener('place_changed', function () {
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
        }

        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
        }
        // marker.setIcon(({
        //     url: place.icon,
        //     size: new google.maps.Size(71, 71),
        //     origin: new google.maps.Point(0, 0),
        //     anchor: new google.maps.Point(17, 34),
        //     scaledSize: new google.maps.Size(35, 35)
        // }));
        // marker.setPosition(place.geometry.location);
        // marker.setVisible(true);

        // var address = '';
        // if (place.address_components) {
        //     address = [
        //         (place.address_components[0] && place.address_components[0].short_name || ''),
        //         (place.address_components[1] && place.address_components[1].short_name || ''),
        //         (place.address_components[2] && place.address_components[2].short_name || '')
        //     ].join(' ');
        // }

        // infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
        // infowindow.open(map, marker);

        // //Location details
        // for (var i = 0; i < place.address_components.length; i++) {
        //     if (place.address_components[i].types[0] == 'postal_code') {
        //         document.getElementById('postal_code').innerHTML = place.address_components[i].long_name;
        //     }
        //     if (place.address_components[i].types[0] == 'country') {
        //         document.getElementById('country').innerHTML = place.address_components[i].long_name;
        //     }
        // }
        // document.getElementById('location').innerHTML = place.formatted_address;
        // document.getElementById('lat').innerHTML = place.geometry.location.lat();
        // document.getElementById('lon').innerHTML = place.geometry.location.lng();
    });
}